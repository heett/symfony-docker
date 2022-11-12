<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('hello', name: 'hello', methods: ['GET'])]
    public function root(): Response
    {
        return $this->json(['test' => 'ok']);
    }
}
