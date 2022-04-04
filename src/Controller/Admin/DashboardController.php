<?php

namespace App\Controller\Admin;

use App\Controller\Admin\UserCrudController;
use App\Entity\Post;
use App\Entity\Reponse;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(UserCrudController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Pole Emploi Symfony');
    }

    public function configureMenuItems(): iterable
    {
        
        yield MenuItem::subMenu('Demandeur d\'emploi', 'fa fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter un demandeur d\'emploi', 'fas fa-plus', User::class)->setAction(Crud::PAGE_NEW)
        ]);

        
        yield MenuItem::subMenu('offre d\'emploi', 'fa fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter une offre d\'emploi', 'fas fa-plus', Post::class)->setAction(Crud::PAGE_NEW)
        ]);

        yield MenuItem::subMenu('Réponse aux offres d\'emploi', 'fa fa-bars')->setSubItems([
            MenuItem::linkToCrud('Répondre à une offre d\'emploi', 'fas fa-plus', Reponse::class)->setAction(Crud::PAGE_NEW)
        ]);

    }
}
