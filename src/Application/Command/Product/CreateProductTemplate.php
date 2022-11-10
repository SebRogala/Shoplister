<?php

namespace App\Application\Command\Product;

class CreateProductTemplate
{
    public function __construct(
        private string $name,
        private string $unit,
        private float $quantity,
        private string $section,
    )
    {}

    public function name(): string
    {
        return $this->name;
    }

    public function unit(): string
    {
        return $this->unit;
    }

    public function quantity(): float
    {
        return $this->quantity;
    }

    public function section(): string
    {
        return $this->section;
    }
}
