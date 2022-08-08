<?php

namespace App\Application\Command\Shop;

use App\Domain\Shop;
use App\Infrastructure\Shop\ShopRepository;

class CreateShopHandler
{
    public function __construct(private ShopRepository $shopRepository)
    {
    }

    public function handle(CreateShop $command): void
    {
        $shoppingList = new Shop(
            $command->creator(),
            $command->name(),
            $command->address(),
        );

        $this->shopRepository->add($shoppingList, true);
    }
}
