<?php

namespace App\Application\Query\ShoppingList;

use App\Application\Query\QueryView;

class ListItemView implements QueryView
{
    public function __construct(
        private readonly string $id,
        private readonly string $name,
        private readonly bool $isClosed,
        private readonly \DateTimeImmutable $createdAt
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'isClosed' => $this->isClosed,
            'createdAt' => $this->createdAt->format(\DateTime::ATOM)
        ];
    }

    public static function fromArray(array $data): QueryView
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['is_closed'],
            new \DateTimeImmutable($data['created_at'])
        );
    }
}
