<?php

namespace App\Application\Command\ShoppingList;

class CreateShoppingList
{
    public function __construct(private string $owner, private ?string $name, private ?bool $isClosed){}

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

    /**
     * @return string
     */
    public function owner(): string
    {
        return $this->owner;
    }
}
