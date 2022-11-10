<?php

namespace App\Application\Command\Product;

use App\Domain\ProductTemplate;
use App\Infrastructure\Product\ProductTemplateRepository;
use App\Infrastructure\Shop\ShopSectionRepository;

class CreateProductTemplateHandler
{
    public function __construct(
        private ProductTemplateRepository $productTemplateRepository,
        private ShopSectionRepository $shopSectionRepository
    )
    {}

    public function handle(CreateProductTemplate $command): void
    {
        $section = $this->shopSectionRepository->findOneBy(['id' => $command->section()]);

        $product = new ProductTemplate(
            $command->name(),
            $command->unit(),
            $command->quantity(),
            $section
        );

        $this->productTemplateRepository->add($product, true);
    }
}
