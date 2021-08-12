<?php

namespace App\Controller\Admin;

use App\Entity\Kviz;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class KvizCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Kviz::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nazev'),
            SlugField::new('slug')->setTargetFieldName('nazev'),
            TextEditorField::new('popis'),
        ];
    }
}
