<?php

namespace App\Controller\Admin;

use App\Entity\Capture;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CaptureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Capture::class;
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
