<?php

namespace App\Application\Command\ShoppingList;

use App\Domain\ShoppingListItem;
use App\Infrastructure\ShoppingList\ShoppingListItemRepository;
use App\Infrastructure\ShoppingList\ShoppingListRepository;

class CreateShoppingListItemHandler
{
    public function __construct(
        private ShoppingListItemRepository $shoppingListItemRepository,
        private ShoppingListRepository $listRepository
    ) {
    }

    public function handle(CreateShoppingListItem $command): void
    {
        $list = $this->listRepository->findOneBy(['id' => $command->listId()]);

        $shoppingListItem = new ShoppingListItem(
            $list,
            $command->name(),
            $command->quantity(),
            $command->unit(),
            $command->section()
        );

        $this->shoppingListItemRepository->add($shoppingListItem, true);
    }
}
