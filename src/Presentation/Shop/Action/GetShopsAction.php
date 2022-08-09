<?php

namespace App\Presentation\Shop\Action;

use App\Application\Query\Shop\ShopsQuery;
use App\Application\Query\Shop\ShopsView;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetShopsAction extends AbstractController
{
    #[Route("/shops", name: "shops.get", methods: ["GET"])]
    public function index(ShopsQuery $shopsQuery): Response
    {
        $items = $shopsQuery->findAll();

        return new JsonResponse(array_map(function (ShopsView $item) {
            return $item->toArray();
        }, $items));
    }
}
