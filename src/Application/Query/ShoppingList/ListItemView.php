<?php

namespace App\Application\Query\ShoppingList;

class ListItemView
{
    public function __construct(
        private readonly string $name
    ) {
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }
}
