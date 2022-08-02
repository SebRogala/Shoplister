<?php

namespace App\Presentation\ShoppingList\Action;

use App\Application\Query\ShoppingList\ListItemQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetShoppingListAction extends AbstractController
{
    #[Route("/shopping-list", name: "shopping_list.get", methods: ["GET"])]
    public function index(Request $request, ListItemQuery $listItemQuery): Response
    {
        $items = $listItemQuery->findAll($this->getUser()->getId());
        //TODO extract values from array
        return new JsonResponse(array_map(function ($item) {
            return [
                'name' => $item->name()
            ];
        }, $items));
    }
}
