<?php

namespace App\Application\Query\Shop;

interface ShopsQuery
{
    public function findAll(): ?array;

    public function getShopsSectionsOrder($shopId): ?array;
}
