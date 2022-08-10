<?php

namespace App\Application\Command\ShoppingList;

class DeleteShoppingListItem
{
    public function __construct(
        private string $id,
    ) {
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }
}
