<?php

namespace App\Application\Command\ShoppingList;

use App\Domain\ShoppingList;
use App\Infrastructure\Shop\ShopRepository;
use App\Infrastructure\ShoppingList\ShoppingListRepository;

class CreateShoppingListHandler
{
    public function __construct(
        private ShoppingListRepository $shoppingListRepository,
        private ShopRepository $shopRepository
    ) {
    }

    public function handle(CreateShoppingList $command): void
    {
        $shop = $this->shopRepository->findOneBy(['id' => $command->shopId()]);

        $shoppingList = new ShoppingList(
            $command->owner(),
            $command->name(),
            $shop,
            $command->isClosed()
        );

        $this->shoppingListRepository->add($shoppingList, true);
    }
}
