<?php

namespace App\Application\Command\Shop;

use App\Domain\User;

class CreateShop
{
    public function __construct(private User $creator, private string $name, private string $address){}

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function address(): string
    {
        return $this->address;
    }

    /**
     * @return User
     */
    public function creator(): User
    {
        return $this->creator;
    }
}
