<?php

namespace App\Presentation\ShoppingList\Action;

use App\Application\Query\ShoppingList\ListItemsQuery;
use App\Application\Query\ShoppingList\ListItemsView;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetShoppingListItemsAction extends AbstractController
{
    #[Route("/shopping-list/{listId}/items", name: "shopping_list_items.get", methods: ["GET"])]
    public function index(string $listId, ListItemsQuery $listItemsQuery): Response
    {
        $items = $listItemsQuery->findAll($listId);

        return new JsonResponse(array_map(function (ListItemsView $item) {
            return $item->toArray();
        }, $items));
    }
}
