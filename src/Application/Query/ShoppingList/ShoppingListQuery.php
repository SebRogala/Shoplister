<?php

namespace App\Application\Query\ShoppingList;

interface ShoppingListQuery
{
    public function item(string $id): ShoppingListView;

    public function findAll(string $ownerId): ?array;
}
