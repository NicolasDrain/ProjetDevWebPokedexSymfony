<?php

namespace App\Controller\Admin;

use App\Entity\PokemonDresseur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PokemonDresseurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PokemonDresseur::class;
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
