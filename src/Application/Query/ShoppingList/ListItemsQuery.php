<?php

namespace App\Application\Query\ShoppingList;

interface ListItemsQuery
{
    public function findAll(string $listId): ?array;
}
