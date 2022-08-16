<?php

namespace App\Application\Query\ShoppingList;

use App\Application\Query\QueryView;

class ListItemsView implements QueryView
{
    public function __construct(
        private readonly string $id,
        private readonly string $name,
        private readonly float $quantity,
        private readonly ?string $unit,
        private readonly bool $isDone,
        private readonly \DateTimeImmutable $updatedAt
    ) {
    }

    public function isDone(): bool
    {
        return $this->isDone;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'unit' => $this->unit,
            'isDone' => $this->isDone,
            'updatedAt' => $this->updatedAt->format(\DateTime::ATOM)
        ];
    }

    public static function fromArray(array $data): QueryView
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['quantity'],
            $data['unit'],
            $data['is_done'],
            new \DateTimeImmutable($data['updated_at'])
        );
    }
}
