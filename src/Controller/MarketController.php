<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/market', name: 'app_market_')]
#[IsGranted('ROLE_USER')]
class MarketController extends AbstractController
{
    #[Route('/', name: 'list')]
    public function index(): Response
    {
        return $this->render('market/index.html.twig', [
            'controller_name' => 'MarketController',
        ]);
    }

    #[Route('/{id}', name: 'detail')]
    public function detail(): Response
    {
        return $this->render('market/index.html.twig', [
            'controller_name' => 'MarketController',
        ]);
    }

    #[Route('/{id}/achat', name: 'achat')]
    public function achat(): Response
    {
        return $this->render('market/index.html.twig', [
            'controller_name' => 'MarketController',
        ]);
    }

    #[Route('/mesAchats', name: 'mesAchat')]
    public function mesAchat(): Response
    {
        return $this->render('market/index.html.twig', [
            'controller_name' => 'MarketController',
        ]);
    }
}
