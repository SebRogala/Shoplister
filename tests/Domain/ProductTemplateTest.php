<?php

namespace App\Tests\Domain;

use App\Domain\ProductTemplate;
use App\Domain\ShopSection;
use PHPUnit\Framework\TestCase;

class ProductTemplateTest extends TestCase
{

    public function testTransformToSearchable()
    {
        $section = new ShopSection('Produkty suche');
        $productTemplate = new ProductTemplate(
            'Mąka',
            'kg',
            '1',
            $section
        );

        $this->assertEqualsIgnoringCase('maka', $productTemplate->getSearchable());
    }
}
