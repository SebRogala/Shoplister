<?php

namespace App\Presentation\ShoppingList\Action;

use App\Application\Command\ShoppingList\CreateShoppingListItem;
use App\Application\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateShoppingListItemAction extends AbstractController
{
    #[Route("/shopping-list/{listId}/item", name: "shopping_list_item.create", methods: ["POST"])]
    public function index(Request $request, string $listId, CommandBus $commandBus): Response
    {
        $command = new CreateShoppingListItem(
            $listId,
            $request->get('name'),
            (float)$request->get('quantity'),
            $request->get('unit'),
        );

        try {
            $commandBus->handle($command);
            return new Response(null, 201);
        } catch (\InvalidArgumentException $exception) {
            return new Response($exception->getMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
