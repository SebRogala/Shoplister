<?php

namespace App\Application\Command\Recipe;

use App\Domain\User;

class CreateRecipe
{
    public function __construct(private User $creator, private string $name)
    {
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return User
     */
    public function creator(): User
    {
        return $this->creator;
    }
}
