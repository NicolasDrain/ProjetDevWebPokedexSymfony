<?php

namespace App\Controller;

use App\Repository\PokemonRepository;
use App\Repository\PokemonDresseurRepository;
use App\Entity\PokemonDresseur;
use App\Entity\Pokemon;
use App\Entity\Dresseur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/chasse', name: 'app_chasse_')]
class ChasseController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('chasse/index.html.twig', [
            'controller_name' => 'ChasseController',
        ]);
    }

    #[Route('/{id}', name: 'index')]
    public function chasse(PokemonDresseur $pokemonDresseur): Response
    {
        if(!$pokemonDresseur->isAvailable()){
            return $this->redirectToRoute('app_entrainement_pokemon_indisponible',[], Response::HTTP_SEE_OTHER);
        }
        return $this->render('chasse/index.html.twig', [
            'controller_name' => 'ChasseController',
        ]);
    }
}
