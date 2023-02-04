<?php

namespace App\Controller;

use App\Repository\OfferRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OffreController extends AbstractController
{
    #[Route('/offres', name: 'app_offres')]
    public function index(Request $request, PaginatorInterface $paginatorInterface, OfferRepository $offerRepository): Response
    {
        $offers = $offerRepository->findAll();
        $alloffers = $paginatorInterface->paginate(
            $offers,
            $request->query->getInt('page', 1),
            6
        );
        return $this->render('offre/index.html.twig', [
            'offers' => $offers,
            'offers' => $alloffers
        ]);
    }

    #[Route('/offres/{id}', name: 'app_offres_show')]
    public function show(OfferRepository $offerRepository, $id): Response
    {
        $offer = $offerRepository->find($id);
        return $this->render('offre/show.html.twig',[
            'offer' => $offer
        ]);
    }
}
