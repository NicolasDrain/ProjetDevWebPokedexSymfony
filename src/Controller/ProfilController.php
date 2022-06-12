<?php

namespace App\Controller;

use App\Repository\PokemonDresseurRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(PokemonDresseurRepository $pokemonDresseurRepository): Response
    {
        $dresseur = $this->getUser();
        $nbPokemon = count($pokemonDresseurRepository->findBy(array('id_dresseur' => $dresseur)));
        return $this->render('profil/index.html.twig', [
            'nbPokemon' => $nbPokemon,
            'dresseur' => $dresseur,
        ]);
    }
}
