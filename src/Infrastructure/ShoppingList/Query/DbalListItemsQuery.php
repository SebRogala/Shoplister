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
            "SELECT id, name, quantity, unit, is_done, updated_at FROM shopping_list_item WHERE list_id = :id ORDER BY is_done ASC , updated_at DESC",
            [
                'id' => $listId,
            ]
        );

        return array_map(function (array $list) {
            return ListItemsView::fromArray($list);
        }, $res);
    }
}
