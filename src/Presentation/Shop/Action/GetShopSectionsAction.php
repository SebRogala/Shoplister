<?php

namespace App\Presentation\Shop\Action;

use App\Application\Query\Shop\ShopSectionsQuery;
use App\Application\Query\Shop\ShopSectionsView;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetShopSectionsAction extends AbstractController
{
    #[Route("/shop-sections", name: "shop_sections.get", methods: ["GET"])]
    public function index(ShopSectionsQuery $shopSectionsQuery): Response
    {
        $items = $shopSectionsQuery->findAll();

        return new JsonResponse(array_map(function (ShopSectionsView $item) {
            return $item->toArray();
        }, $items));
    }
}
