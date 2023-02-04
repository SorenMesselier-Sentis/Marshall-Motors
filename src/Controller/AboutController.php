<?php

namespace App\Controller;

use App\Repository\OfferRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AboutController extends AbstractController
{
    #[Route('/about', name: 'app_about')]
    public function index(OfferRepository $offerRepository): Response
    {
        $lastOffers = $offerRepository->findBy(criteria:[], orderBy:["updatedAt" => "DESC"], limit:2);
        return $this->render('about/index.html.twig', [
            'last_offers' => $lastOffers
        ]);
    }
}
