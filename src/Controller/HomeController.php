<?php

namespace App\Controller;

use App\Repository\OfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(OfferRepository $offerRepository): Response
    {
        $lastOffers = $offerRepository->findBy(criteria:[], orderBy:["updatedAt" => "DESC"], limit:4);
        return $this->render('home/index.html.twig', [
            'last_offers' => $lastOffers
        ]);
    }
}
