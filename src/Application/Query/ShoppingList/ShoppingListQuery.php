<?php

namespace App\Application\Query\ShoppingList;

interface ShoppingListQuery
{
    public function item(string $id): ShoppingListView;

    public function findAssignedShopId($id): ?string;

    public function findAll(string $ownerId): ?array;
}
