<?php

namespace App\Controller\Admin;

use App\Entity\Offer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OfferCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Offer::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Offre de vehicule')
            ->setEntityLabelInPlural('Offres de vehicules');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled(),
            TextField::new('title'),
            TextareaField::new('description'),
            NumberField::new('price'),
            TextField::new('url'),
            ImageField::new('image')
                ->setUploadDir('/public/uploads/offers')
                ->setUploadedFileNamePattern('/uploads/offers/[randomhash].[extension]')
                ->setFormTypeOptions([
                    'attr' => [
                        'accept' => 'image/jpeg, image/png, image/jpg'
                    ]
                ]),
            ImageField::new('image2')
                ->setUploadDir('/public/uploads/offers')
                ->setUploadedFileNamePattern('/uploads/offers/[randomhash].[extension]')
                ->setFormTypeOptions([
                    'attr' => [
                        'accept' => 'image/jpeg, image/png, image/jpg'
                    ]
                ]),
            ImageField::new('image3')
                ->setUploadDir('/public/uploads/offers')
                ->setUploadedFileNamePattern('/uploads/offers/[randomhash].[extension]')
                ->setFormTypeOptions([
                    'attr' => [
                        'accept' => 'image/jpeg, image/png, image/jpg'
                    ]
                ]),
        ];
    }
}
