<?php

namespace App\Presentation\Shop\Action;

use App\Application\Command\Shop\SetDefaultSectionsOrderInShop;
use App\Application\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SetDefaultSectionsOrderInShopAction extends AbstractController
{
    #[Route("/shop/{shopId}/set-default-sections-order", name: "shop.set_default_sections_order", methods: ["POST"])]
    public function index(Request $request, string $shopId, CommandBus $commandBus): Response
    {
        $sectionsOrder = $request->get('sectionsOrder');

        $command = new SetDefaultSectionsOrderInShop($shopId, $sectionsOrder);
        $commandBus->handle($command);

        return new Response(null, 201);
    }
}
