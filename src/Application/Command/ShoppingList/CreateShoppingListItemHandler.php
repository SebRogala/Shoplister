<?php

namespace App\Application\Command\ShoppingList;

use App\Domain\ShoppingListItem;
use App\Infrastructure\Shop\ShopSectionRepository;
use App\Infrastructure\ShoppingList\ShoppingListItemRepository;
use App\Infrastructure\ShoppingList\ShoppingListRepository;

class CreateShoppingListItemHandler
{
    public function __construct(
        private ShoppingListItemRepository $shoppingListItemRepository,
        private ShoppingListRepository $listRepository,
        private ShopSectionRepository $shopSectionRepository
    ) {
    }

    public function handle(CreateShoppingListItem $command): void
    {
        $list = $this->listRepository->findOneBy(['id' => $command->listId()]);
        $section = $this->shopSectionRepository->findOneBy(['id' => $command->section()]);

        $shoppingListItem = new ShoppingListItem(
            $list,
            $command->name(),
            $command->quantity(),
            $command->unit(),
            $section
        );

        $this->shoppingListItemRepository->add($shoppingListItem, true);
        $this->listRepository->updateCounterOfCurrentItems($list, true);
    }
}
