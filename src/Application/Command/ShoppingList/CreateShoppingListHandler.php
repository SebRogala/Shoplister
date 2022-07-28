<?php

namespace App\Application\Command\ShoppingList;

use App\Domain\ShoppingList;
use App\Infrastructure\ShoppingList\ShoppingListRepository;

class CreateShoppingListHandler
{
    public function __construct(private ShoppingListRepository $shoppingListRepository)
    {
    }

    public function handle(CreateShoppingList $command): void
    {
        $shoppingList = new ShoppingList(
            $command->isClosed(),
            $command->name()
        );

        $this->shoppingListRepository->add($shoppingList, true);
    }
}