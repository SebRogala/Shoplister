<?php

namespace App\Application\Query\Shop;

use App\Application\Query\QueryView;

class ShopSectionsView implements QueryView
{
    public function __construct(
        private readonly string $id,
        private readonly string $name
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }

    public static function fromArray(array $data): QueryView
    {
        return new self(
            $data['id'],
            $data['name'],
        );
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
