<?php

namespace App\Presentation\Shop\Action;

use App\Application\Command\Shop\CreateShop;
use App\Application\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateShopAction extends AbstractController
{
    #[Route("/shop", name: "shop.create", methods: ["POST"])]
    public function index(Request $request, CommandBus $commandBus): Response
    {
        $name = $request->get('name');
        $address = $request->get('address');

        $command = new CreateShop($this->getUser(), $name, $address);
        $commandBus->handle($command);

        return new Response(null, 201);
    }
}
