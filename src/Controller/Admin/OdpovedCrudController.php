<?php

namespace App\Controller\Admin;

use App\Entity\Odpoved;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OdpovedCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Odpoved::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('odpoved'),
            AssociationField::new('otazka')->autocomplete(),
            BooleanField::new('jeSpravna'),
        ];
    }
}
