<?php

namespace App\Application\Query\ShoppingList;

interface ListItemQuery
{
    public function item(string $id): ListItemView;

    public function findAll(string $ownerId): ?array;
}
