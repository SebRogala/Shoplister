<?php

namespace App\Presentation\ShoppingList\Action;

use App\Application\Query\QueryView;
use App\Application\Query\ShoppingList\ListItemQuery;
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

        return new JsonResponse(array_map(function (QueryView $item) {
            return $item->toArray();
        }, $items));
    }
}
