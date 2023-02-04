<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalnoticesController extends AbstractController
{
    #[Route('/legalnotices', name: 'app_legalnotices')]
    public function index(): Response
    {
        return $this->render('legalnotices/index.html.twig', [
            'controller_name' => 'LegalnoticesController',
        ]);
    }
}
