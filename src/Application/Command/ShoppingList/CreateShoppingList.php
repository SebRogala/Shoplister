<?php

namespace App\Application\Command\ShoppingList;

use App\Domain\User;

class CreateShoppingList
{
    public function __construct(private User $owner, private ?string $name, private ?string $shopId, private ?bool $isClosed){}

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
     * @return string|null
     */
    public function shopId(): ?string
    {
        return $this->shopId;
    }

    /**
     * @return User
     */
    public function owner(): User
    {
        return $this->owner;
    }
}
