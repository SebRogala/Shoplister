<?php

namespace App\Application\Query\ShoppingList;

interface ListItemQuery
{
    public function item(string $id): ListItemView;
}
