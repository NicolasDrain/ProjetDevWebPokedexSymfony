<?php

namespace App\Controller;

use App\Repository\PokemonRepository;
use App\Repository\PokemonDresseurRepository;
use App\Entity\PokemonDresseur;
use App\Entity\Pokemon;
use App\Entity\Dresseur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChoixStarterController extends AbstractController
{
    #[Route('/choixStarter', name: 'app_choix_starter')]
    #[Security("is_granted('ROLE_USER') and user.isStarterTaken() == false")]
    public function index(PokemonRepository $pokemonRepository): Response
    {
        $starter_pokemon = $pokemonRepository->findBy(array('is_starter' => true));
        return $this->render('choix_starter/index.html.twig', [
            'starter_pokemon' => $starter_pokemon,
        ]);
    }
    #[Route('/choixStarter/add/{id}', name: 'app_add_starter')]
    #[Security("is_granted('ROLE_USER') and user.isStarterTaken() == false")]
    public function addStarter(Pokemon $pokemon, PokemonDresseurRepository $pokemonDresseurRepository): Response
    {
        $dresseur = $this->getUser();
        $dresseur->setStarterTaken(true);
        $pokemonDresseur = new PokemonDresseur();
        $pokemonDresseur->setIdPokemon($pokemon);
        $pokemonDresseur->setIdDresseur($dresseur);
        $pokemonDresseur->setExp(0);
        $pokemonDresseurRepository->add($pokemonDresseur, true);
        
        return $this->redirectToRoute('app_home',[], Response::HTTP_SEE_OTHER);
    }
}
