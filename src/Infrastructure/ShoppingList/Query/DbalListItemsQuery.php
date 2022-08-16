<?php

namespace App\Infrastructure\ShoppingList\Query;

use App\Application\Query\ShoppingList\ListItemsQuery;
use App\Application\Query\ShoppingList\ListItemsView;
use Doctrine\DBAL\Connection;

class DbalListItemsQuery implements ListItemsQuery
{
    public function __construct(private Connection $connection)
    {
    }

    public function findAll(string $listId): ?array
    {
        $res = $this->connection->fetchAllAssociative(
            "SELECT i.id, i.name, i.quantity, i.unit, i.is_done, i.updated_at, s.name as section FROM shopping_list_item i INNER JOIN shop_section s ON i.section_id = s.id WHERE list_id = :id ORDER BY updated_at DESC",
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
        $res = $this->connection->fetchAllAssociative(
            "SELECT id, name, quantity, unit, is_done, updated_at, section FROM shopping_list_item WHERE list_id = :id ORDER BY is_done ASC , updated_at DESC",
            [
                'id' => $listId,
            ]
        );

        $result = [];
        foreach ($res as $item) {
            $result[$item['section']][] = ListItemsView::fromArray($item);
        }

        $finalRes = [];
        foreach ($result as $groupedItems) {
            foreach ($groupedItems as $listItem) {
                $finalRes[] = $listItem;
            }
        }

        return $finalRes;
    }
}
