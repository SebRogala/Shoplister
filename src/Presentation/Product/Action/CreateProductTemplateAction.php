<?php

namespace App\Presentation\Product\Action;

use App\Application\Command\Product\CreateProductTemplate;
use App\Application\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateProductTemplateAction extends AbstractController
{
    #[Route("/product-template", name: "product_template.create", methods: ["POST"])]
    public function index(Request $request, CommandBus $commandBus): Response
    {
        $command = new CreateProductTemplate(
            $request->get('name'),
            $request->get('unit'),
            (float)$request->get('quantity'),
            $request->get('section'),
        );

        $commandBus->handle($command);

        return new Response(null, 201);
    }
}
