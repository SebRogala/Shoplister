<?php

namespace App\Application\Command\ShoppingList;

use App\Infrastructure\ShoppingList\ShoppingListItemRepository;

class ToggleIsDoneOnShoppingListItemHandler
{
    public function __construct(
        private ShoppingListItemRepository $shoppingListItemRepository
    ) {
    }

    public function handle(ToggleIsDoneOnShoppingListItem $command): void
    {
        $item = $this->shoppingListItemRepository->findOneBy(['id' => $command->id()]);

        $item->toggleIsDone();
        $item->updateListTimestamp();

        $this->shoppingListItemRepository->add($item, true);
    }
}
