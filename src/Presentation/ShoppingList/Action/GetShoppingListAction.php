<?php

namespace App\Presentation\ShoppingList\Action;

use App\Application\Query\ShoppingList\ListItemQuery;
use App\Application\Query\ShoppingList\ListItemView;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetShoppingListAction extends AbstractController
{
    #[Route("/shopping-list", name: "shopping_list.get", methods: ["GET"])]
    public function index(ListItemQuery $listItemQuery): Response
    {
        $items = $listItemQuery->findAll($this->getUser()->getId());

        return new JsonResponse(array_map(function (ListItemView $item) {
            return $item->toArray();
        }, $items));
    }
}
