<?php

namespace App\Application\Query\ShoppingList;

use App\Application\Query\QueryView;

class ListItemView implements QueryView
{
    public function __construct(
        private readonly string $name
    ) {
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name(),
        ];
    }
}
