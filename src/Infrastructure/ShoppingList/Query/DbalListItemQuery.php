<?php

namespace App\Infrastructure\ShoppingList\Query;

use App\Application\Query\ShoppingList\ListItemQuery;
use App\Application\Query\ShoppingList\ListItemView;
use Doctrine\DBAL\Connection;

class DbalListItemQuery implements ListItemQuery
{
    public function __construct(private Connection $connection)
    {
    }

    public function item(string $id): ListItemView
    {
        $res = $this->connection->fetchAssociative(
            "SELECT name, is_closed, createdAt FROM shopping_list WHERE id = :id",
            [
                'id' => $id,
            ]
        );

        return new ListItemView($res['name']);
    }

    public function findAll(string $ownerId): ?array
    {
        $res = $this->connection->fetchAllAssociative(
            "SELECT name, is_closed, created_at FROM shopping_list WHERE owner_id = :id",
            [
                'id' => $ownerId,
            ]
        );

        return array_map(function (array $list) {
            return new ListItemView($list['name']);
        }, $res);
    }
}
