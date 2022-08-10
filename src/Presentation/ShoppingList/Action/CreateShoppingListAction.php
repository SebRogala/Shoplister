<?php

namespace App\Presentation\ShoppingList\Action;

use App\Application\Command\ShoppingList\CreateShoppingList;
use App\Application\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateShoppingListAction extends AbstractController
{
    #[Route("/shopping_list", name: "shopping_list.create", methods: ["POST"])]
    public function index(Request $request, CommandBus $commandBus): Response
    {
        $name = $request->get('name');
        $shopId = $request->get('shopId');

        $command = new CreateShoppingList($this->getUser(), $name, $shopId, false);
        $commandBus->handle($command);

        return new Response(null, 201);
    }
}
