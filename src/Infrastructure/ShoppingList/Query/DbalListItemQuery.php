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
            "SELECT name, is_closed FROM shopping_list WHERE id = :id",
            [
                'id' => $id,
            ]
        );

        return new ListItemView($res['name']);
    }
}
