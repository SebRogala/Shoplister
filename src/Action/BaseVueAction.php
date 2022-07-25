<?php

namespace App\Action;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseVueAction extends AbstractController
{
    #[Route("/about",    name: "vue_about",    methods: ["GET"])]
    public function renderBaseTemplate(): Response
    {
        return $this->render('base.html.twig');
    }
}
