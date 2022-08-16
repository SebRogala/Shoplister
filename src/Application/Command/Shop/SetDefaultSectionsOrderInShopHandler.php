<?php

namespace App\Application\Command\Shop;

use App\Infrastructure\Shop\ShopRepository;

class SetDefaultSectionsOrderInShopHandler
{
    public function __construct(private ShopRepository $shopRepository)
    {
    }

    public function handle(SetDefaultSectionsOrderInShop $command): void
    {
        $shop = $this->shopRepository->findOneBy(['id' => $command->shopId()]);
        $shop->setDefaultSectionOrder($command->sectionsOrder());
        $this->shopRepository->add($shop, true);
    }
}
