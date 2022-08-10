<?php

namespace App\Infrastructure\ShoppingList\Query;

use App\Application\Query\ShoppingList\ShoppingListQuery;
use App\Application\Query\ShoppingList\ShoppingListView;
use Doctrine\DBAL\Connection;

class DbalShoppingListQuery implements ShoppingListQuery
{
    public function __construct(private Connection $connection)
    {
    }

    public function item(string $id): ShoppingListView
    {
        $res = $this->connection->fetchAssociative(
            "SELECT id, name, is_closed, created_at, updated_at, counter_of_items FROM shopping_list WHERE id = :id",
            [
                'id' => $id,
            ]
        );

        return ShoppingListView::fromArray($res);
    }

    public function findAll(string $ownerId): ?array
    {
        $res = $this->connection->fetchAllAssociative(
            "SELECT id, name, is_closed, created_at, updated_at, counter_of_items FROM shopping_list WHERE owner_id = :id ORDER BY updated_at DESC",
            [
                'id' => $ownerId,
            ]
        );

        return array_map(function (array $list) {
            return ShoppingListView::fromArray($list);
        }, $res);
    }
}
