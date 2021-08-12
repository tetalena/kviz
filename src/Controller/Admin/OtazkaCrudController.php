<?php

namespace App\Controller\Admin;

use App\Entity\Otazka;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OtazkaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Otazka::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('otazka'),
            AssociationField::new('kviz')->autocomplete(),
        ];
    }
}
