<?php

namespace App\Controller\Admin;

use App\Entity\Dresseur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DresseurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dresseur::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
