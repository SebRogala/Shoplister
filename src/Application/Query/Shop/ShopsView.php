<?php

namespace App\Application\Query\Shop;

use App\Application\Query\QueryView;

class ShopsView implements QueryView
{
    public function __construct(
        private readonly string $id,
        private readonly string $name,
        private readonly string $address,
        private readonly \DateTimeImmutable $createdAt
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'createdAt' => $this->createdAt->format(\DateTime::ATOM)
        ];
    }

    public static function fromArray(array $data): QueryView
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['address'],
            new \DateTimeImmutable($data['created_at'])
        );
    }
}
