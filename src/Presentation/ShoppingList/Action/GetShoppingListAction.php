<?php

namespace App\Presentation\ShoppingList\Action;

use App\Application\Query\ShoppingList\ShoppingListQuery;
use App\Application\Query\ShoppingList\ShoppingListView;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetShoppingListAction extends AbstractController
{
    #[Route("/shopping-list", name: "shopping_list.get", methods: ["GET"])]
    public function index(ShoppingListQuery $listItemQuery): Response
    {
        $items = $listItemQuery->findAll($this->getUser()->getId());

        return new JsonResponse(array_map(function (ShoppingListView $item) {
            return $item->toArray();
        }, $items));
    }
}
