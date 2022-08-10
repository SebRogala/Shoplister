<?php

namespace App\Application\Query\ShoppingList;

use App\Application\Query\QueryView;

class ShoppingListView implements QueryView
{
    public function __construct(
        private readonly string $id,
        private readonly string $name,
        private readonly bool $isClosed,
        private readonly int $counterOfItems,
        private readonly \DateTimeImmutable $createdAt,
        private readonly \DateTimeImmutable $updatedAt,
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'isClosed' => $this->isClosed,
            'counterOfItems' => $this->counterOfItems,
            'createdAt' => $this->createdAt->format(\DateTime::ATOM),
            'updatedAt' => $this->updatedAt->format(\DateTime::ATOM),
        ];
    }

    public static function fromArray(array $data): QueryView
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['is_closed'],
            $data['counter_of_items'],
            new \DateTimeImmutable($data['created_at']),
            new \DateTimeImmutable($data['updated_at']),
        );
    }
}
