<?php

namespace App\Infrastructure\Shop\Query;

use App\Application\Query\Shop\ShopsQuery;
use App\Application\Query\Shop\ShopsView;
use Doctrine\DBAL\Connection;

class DbalShopsQuery implements ShopsQuery
{
    public function __construct(private Connection $connection)
    {
    }

    public function findAll(): ?array
    {
        $res = $this->connection->fetchAllAssociative(
            "SELECT id, name, address, created_at FROM shop ORDER BY created_at DESC"
        );

        return array_map(function (array $list) {
            return ShopsView::fromArray($list);
        }, $res);
    }
}
