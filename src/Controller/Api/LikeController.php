<?php

namespace App\Controller\Api;

use App\Entity\Like;
use App\Entity\Offer;
use App\Form\LikeFormType;
use App\Repository\LikeRepository;
use App\Repository\OfferRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('api/likes')]
class LikeController extends AbstractController
{

    #[Route('', name: 'api_likes_create', methods: ['POST'])]
    public function new(Request $request, OfferRepository $offerRepository, LikeRepository $likeRepository): Response
    {
        $like = new Like();
        $form = $this->createForm(LikeFormType::class, $like);
        $form->submit($request->toArray());
        $offer = $offerRepository->find($request->toArray()['offer']);
        if ($offer instanceof Offer) {
            $likeRepository->add($like);
            return $this->json([
                'like' => [
                    'id' => $like->getId(),
                    'name' => $like->getName(),
                    'email' => $like->getEmail(),
                    'offer' => [
                        'id' => $offer->getId(),
                        'title' => $offer->getTitle(),
                    ]
                ]
            ]);
        }

        return $this->json(['like' => null], 400);
    }
}
