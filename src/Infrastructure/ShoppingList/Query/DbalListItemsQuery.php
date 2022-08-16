<?php

namespace App\Infrastructure\ShoppingList\Query;

use App\Application\Query\Shop\ShopsQuery;
use App\Application\Query\ShoppingList\ListItemsQuery;
use App\Application\Query\ShoppingList\ListItemsView;
use App\Application\Query\ShoppingList\ShoppingListQuery;
use Doctrine\DBAL\Connection;

class DbalListItemsQuery implements ListItemsQuery
{
    public function __construct(
        private Connection $connection,
        private ShoppingListQuery $shoppingListQuery,
        private ShopsQuery $shopsQuery
    ) {
    }

    public function findAll(string $listId): ?array
    {
        $res = $this->connection->fetchAllAssociative(
            "SELECT id, name, quantity, unit, is_done, updated_at, section_id FROM shopping_list_item WHERE list_id = :id ORDER BY updated_at DESC",
            [
                'id' => $listId,
            ]
        );

        return array_map(function (array $list) {
            return ListItemsView::fromArray($list);
        }, $res);
    }


    public function findAllWithGrouped(string $listId): ?array
    {
        $shopId = $this->shoppingListQuery->findAssignedShopId($listId);
        $orderedSections = $this->shopsQuery->getShopsSectionsOrder($shopId);

        $fetchedShoppingListItems = $this->connection->fetchAllAssociative(
            "SELECT id, name, quantity, unit, is_done, updated_at, section_id FROM shopping_list_item WHERE list_id = :id ORDER BY is_done ASC , updated_at DESC",
            [
                'id' => $listId,
            ]
        );

        $groupedShoppingListItems = [];
        foreach ($fetchedShoppingListItems as $item) {
            $groupedShoppingListItems[$item['section_id']][] = ListItemsView::fromArray($item);
        }

        $orderedAndGroupedItems = [];
        if (!empty($orderedSections)) {
            $groupedShoppingListItemsKeys = array_keys($groupedShoppingListItems);
            foreach ($orderedSections as $orderedSectionId) {
                if (in_array($orderedSectionId, $groupedShoppingListItemsKeys)) {
                    $orderedAndGroupedItems[$orderedSectionId] = $groupedShoppingListItems[$orderedSectionId];
                    unset($groupedShoppingListItems[$orderedSectionId]);
                }
            }
        }
        $orderedAndGroupedItems = array_merge($orderedAndGroupedItems, $groupedShoppingListItems);

        $groupedByAllDone = [];
        foreach ($orderedAndGroupedItems as $id => $list) {
            if ($list[0]->isDone()) {
                $groupedByAllDone[$id] = $list;
                unset($orderedAndGroupedItems[$id]);
            }
        }
        $groupedByAllDone = array_merge($orderedAndGroupedItems, $groupedByAllDone);

        $flattenArrayOfItems = [];
        foreach ($groupedByAllDone as $groupedItems) {
            foreach ($groupedItems as $listItem) {
                $flattenArrayOfItems[] = $listItem;
            }
        }

        return $flattenArrayOfItems;
    }
}
