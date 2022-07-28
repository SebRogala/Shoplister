<?php

namespace App\Application\Command\ShoppingList;

class CreateShoppingList
{
    public function __construct(private ?bool $isClosed, private ?string $name){}

    /**
     * @return bool|null
     */
    public function isClosed(): ?bool
    {
        return $this->isClosed;
    }

    /**
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->name;
    }
}
