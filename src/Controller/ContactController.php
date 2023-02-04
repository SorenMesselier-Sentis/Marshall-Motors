<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{

    #[Route('/contact', name: 'app_contact')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $message = new Contact();
        $form = $this->createForm(ContactFormType::class, $message);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {  
            $message = $form->getData();
            if($message->getPhone()) {
                $phoneNumber = $message->getPhone();
                $firstCharacter = substr($phoneNumber, 0, 1);
                if (str_contains($firstCharacter, '0')) {
                    $phoneNumber = substr_replace($phoneNumber, '+33', 0,1);
                    $message->setPhone($phoneNumber);   
                }
            }
            $entityManager->persist($message);
            $entityManager->flush();
        }


        return $this->renderForm('contact/index.html.twig', [
            'contactForm' => $form,
        ]);
    }
}
