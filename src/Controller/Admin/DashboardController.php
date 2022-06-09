<?php

namespace App\Controller\Admin;

use App\Entity\Pokemon;
use App\Entity\Dresseur;
use App\Entity\PokemonDresseur;
use App\Entity\Type;
use App\Entity\Capture;
use App\Entity\Region;
use App\Entity\Vente;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ){
        
    }
    #[Route('/admin', name: 'admin')]
    #[Security("is_granted('ROLE_USER')")]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(PokemonCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ProjetDevWebPokedexSymfony');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Dresseur');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Dresseur', 'fas fa-plus', Dresseur::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Dresseur', 'fas fa-eye', Dresseur::class)
        ]);

        yield MenuItem::section('Pokemon');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Pokemon', 'fas fa-plus', Pokemon::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Pokemon', 'fas fa-eye', Pokemon::class)
        ]);

        yield MenuItem::section('PokemonDresseur');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create PokemonDresseur', 'fas fa-plus', PokemonDresseur::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show PokemonDresseur', 'fas fa-eye', PokemonDresseur::class)
        ]);

        yield MenuItem::section('Vente');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Vente', 'fas fa-plus', Vente::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Vente', 'fas fa-eye', Vente::class)
        ]);

        yield MenuItem::section('Type');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Type', 'fas fa-plus', Type::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Type', 'fas fa-eye', Type::class)
        ]);

        yield MenuItem::section('Region');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Region', 'fas fa-plus', Region::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Region', 'fas fa-eye', Region::class)
        ]);

        yield MenuItem::section('Capture');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Create Capture', 'fas fa-plus', Capture::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Capture', 'fas fa-eye', Capture::class)
        ]);

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
