<?php

namespace App\Presentation\ShoppingList\Action;

use App\Application\Command\ShoppingList\DeleteShoppingListItem;
use App\Application\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteShoppingListItemAction extends AbstractController
{
    #[Route("/shopping-list-item/{id}", name: "shopping_list_item.delete", methods: ["DELETE"])]
    public function index(string $id, CommandBus $commandBus): Response
    {
        $command = new DeleteShoppingListItem($id);
        $commandBus->handle($command);

        return new Response(null, 204);
    }
}
