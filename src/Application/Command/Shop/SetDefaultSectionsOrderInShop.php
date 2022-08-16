<?php

namespace App\Application\Command\Shop;


class SetDefaultSectionsOrderInShop
{
    public function __construct(private string $shopId, private string $sectionsOrder){}

    /**
     * @return string
     */
    public function shopId(): string
    {
        return $this->shopId;
    }

    /**
     * @return string
     */
    public function sectionsOrder(): string
    {
        return $this->sectionsOrder;
    }
}
