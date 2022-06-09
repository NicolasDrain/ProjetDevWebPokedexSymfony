<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Repository\PokemonRepository;
use App\Repository\PokemonDresseurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/list', name: 'app_list_')]
class ListController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(PokemonRepository $pokemonRepository): Response
    {
        $pokemon = $pokemonRepository->findAll();
        //dd($pokemon);
        return $this->render('list/index.html.twig', [
            'pokemons' => $pokemon
        ]
    );
    }

    #[Route('/{nom}', name: 'pokemon')]
    public function pokemon(Pokemon $pokemon): Response
    {
        //dd($pokemon);
        return $this->render('list/pokemon.html.twig', [
            'pokemon' => $pokemon
        ]
    );
    }

    #[Route('/monPokedex', name: 'pokedex')]
    public function pokedex(PokemonRepository $pokemonRepository, PokemonDresseurRepository $pokemonDresseurRepository): Response
    {
        dd('Salut');
        //$dresseur = $this->getUser();
        //$pokemonDresseur = $pokemonDresseurRepository->findBy(array('id_dresseur' => $dresseur));
        //$dd($pokemonDresseur);
        $pokemon = $pokemonRepository->findAll();
        //dd($pokemon);
        return $this->render('list/pokedex.html.twig', [
            'pokemons' => $pokemon
        ]
    );
    }
}