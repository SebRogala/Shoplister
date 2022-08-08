<?php

namespace App\Presentation\ShoppingList\Action;

use App\Application\Command\ShoppingList\ToggleIsDoneOnShoppingListItem;
use App\Application\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToggleIsDoneOnShoppingListItemAction extends AbstractController
{
    #[Route("/shopping-list-item/{id}/toggle-is-done", name: "shopping_list_item.toggle_is_done", methods: ["POST"])]
    public function index(string $id, CommandBus $commandBus): Response
    {
        $command = new ToggleIsDoneOnShoppingListItem($id);
        $commandBus->handle($command);

        return new Response(null, 201);
    }
}
