<?php

namespace App\Controller\Admin;

use App\Entity\Reponse;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ReponseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reponse::class;
    }



    public function configureFields(string $pageName): iterable
    {
        return [
            TextEditorField::new('content'),
        ];
    }
}
