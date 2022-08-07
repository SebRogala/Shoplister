<?php

namespace App\Application\Command\ShoppingList;

class CreateShoppingListItem
{
    public function __construct(
        private string $listId,
        private string $name,
        private float $quantity,
        private string $unit
    ) {
    }

    /**
     * @return string
     */
    public function listId(): string
    {
        return $this->listId;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function quantity(): float
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public function unit(): string
    {
        return $this->unit;
    }

}
