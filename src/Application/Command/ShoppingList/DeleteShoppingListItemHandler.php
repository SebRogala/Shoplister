<?php

namespace App\Application\Command\ShoppingList;

use App\Domain\ShoppingListItem;
use App\Infrastructure\ShoppingList\ShoppingListItemRepository;
use App\Infrastructure\ShoppingList\ShoppingListRepository;

class DeleteShoppingListItemHandler
{
    public function __construct(
        private ShoppingListItemRepository $shoppingListItemRepository,
        private ShoppingListRepository $listRepository
    ) {
    }

    public function handle(DeleteShoppingListItem $command): void
    {
        $item = $this->shoppingListItemRepository->findOneBy(['id' => $command->id()]);
        $list = $item->getShoppingList();

        $this->shoppingListItemRepository->remove($item, true);
        $this->listRepository->updateCounterOfCurrentItems($list, true);
    }
}
