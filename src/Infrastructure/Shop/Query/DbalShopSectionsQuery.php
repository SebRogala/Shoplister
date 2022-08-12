<?php

namespace App\Infrastructure\Shop\Query;

use App\Application\Query\Shop\ShopSectionsQuery;
use App\Application\Query\Shop\ShopSectionsView;
use Doctrine\DBAL\Connection;

class DbalShopSectionsQuery implements ShopSectionsQuery
{
    public function __construct(private Connection $connection)
    {
    }

    public function findAll(): ?array
    {
        $res = $this->connection->fetchAllAssociative(
            "SELECT id, name FROM shop_section"
        );

        return array_map(function (array $list) {
            return ShopSectionsView::fromArray($list);
        }, $res);
    }
}
