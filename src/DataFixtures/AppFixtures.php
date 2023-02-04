<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use App\Entity\Like;
use App\Entity\Offer;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        // Create admin
        $user = new User();
        $user->setName('Admin name');
        $user->setEmail('admin@gmail.com');
        $user->setPassword($this->hasher->hashPassword($user, 'password'));
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);

        // Create offers
        $offers = [];
        for ($i = 1; $i <= 10; $i++) {
            $offer = new Offer();
            $offer->setTitle('Offer ' . $i);
            $offer->setDescription('Description ' . $i);
            $offer->setPrice(rand(30000, 200000) / 100);
            $offer->setImage('https://via.placeholder.com/350x150');
            $offer->setImage2(rand(0, 1) == 0 ? 'https://via.placeholder.com/350x150' : null);
            $offer->setImage3(rand(0, 1) == 0 ? 'https://via.placeholder.com/350x150' : null);
            $offer->setUrl(rand(0, 1) == 0 ? 'https://google.com' : null);
            $manager->persist($offer);
            $offers[] = $offer;
        }

        // Create likes
        for ($i = 1; $i <= 10; $i++) {
            $like = new Like();
            $like->setEmail('client' . $i . '@gmail.com');
            $like->setName('Client ' . $i);
            $like->setOffer($offers[rand(0, count($offers) - 1)]);
            $manager->persist($like);
        }

        // Create contact messages
        for ($i = 1; $i <= 10; $i++) {
            $contact = new Contact();
            $contact->setEmail('client' . $i . '@gmail.com');
            $contact->setName('Client ' . $i);
            $contact->setPhone(rand(0, 1) == 0 ? 0611223344 + $i : null);
            $contact->setMessage('Message ' . $i);
            $manager->persist($contact);
        }

        $manager->flush();
    }
}
