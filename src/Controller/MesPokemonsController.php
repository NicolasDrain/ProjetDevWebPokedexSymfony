<?php

namespace App\Controller;

use App\Repository\PokemonDresseurRepository;
use App\Repository\PokemonRepository;
use App\Entity\PokemonDresseur;
use App\Form\PokemonDresseurType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MesPokemonsController extends AbstractController
{
    #[Route('/mesPokemons', name: 'app_mes_pokemons')]
    #[IsGranted('ROLE_USER')]
    public function index(PokemonDresseurRepository $pokemonDresseurRepository): Response
    {
        $dresseur = $this->getUser();
        $pokemonDresseurList = $pokemonDresseurRepository->findBy(array('id_dresseur' => $dresseur));
        $pokemonDresseur = [];
        foreach($pokemonDresseurList as $pokemon){
            $info = [];
            $isReady = $pokemon->isAvailable();
            $info = ['pokemon' => $pokemon, 'isReady' => $isReady];
            array_push($pokemonDresseur, $info);
        }
        return $this->render('mes_pokemons/index.html.twig', [
            'pokemonDresseur' => $pokemonDresseur,
        ]);
    }

    #[Route('/mesPokemons/{id}', name: 'app_modify_pokemon')]
    #[Security("is_granted('ROLE_USER') and user === pokemonDresseur.getIdDresseur()")]
    public function modifyPokemon(Request $request, PokemonDresseur $pokemonDresseur, PokemonDresseurRepository $pokemonDresseurRepository): Response
    {
        $form = $this->createForm(PokemonDresseurType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $surnom = $task['surnom'];
            $pokemonDresseur->setSurnom($surnom);
            $pokemonDresseurRepository->add($pokemonDresseur, true);
        }
        $dresseur = $this->getUser();
        return $this->render('mes_pokemons/detail.html.twig', [
            'pokemonDresseur' => $pokemonDresseur,
            'form' => $form->createView(),
        ]);
    }
}
