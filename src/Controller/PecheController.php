<?php

namespace App\Controller;

use App\Entity\Dresseur;
use App\Entity\PokemonDresseur;
use App\Repository\PokemonRepository;
use App\Repository\TypeRepository;
use App\Repository\PokemonDresseurRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/peche', name: 'app_peche_')]
#[IsGranted('ROLE_USER')]
class PecheController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('peche/index.html.twig', [
            'controller_name' => 'PecheController',
        ]);
    }

    #[Route('/{appat}', name: 'resultat')]
    public function resultat(string $appat, PokemonRepository $pokemonRepository, TypeRepository $typeRepository, PokemonDresseurRepository $pokemonDresseurRepository): Response
    {
        function addNewPokemonEau($list_pokemon_eau, $dresseur, $niv_min, $niv_max, $pokemonDresseurRepository){
            $pokemon = $list_pokemon_eau[rand(0, count($list_pokemon_eau)-1)];
            $pokemonDresseur = new PokemonDresseur();
            $pokemonDresseur->setIdDresseur($dresseur);
            $pokemonDresseur->setIdPokemon($pokemon);
            $pokemonDresseur->setExp(rand($pokemonDresseur->getExpByNiveau($niv_min), $pokemonDresseur->getExpByNiveau($niv_max))-1);
            $pokemonDresseurRepository->add($pokemonDresseur, true);
            return $pokemonDresseur;
        }
        $dresseur = $this->getUser();
        $id_type_eau = $typeRepository->findBy(array('nom' => 'eau'));
        $list_pokemon_eau = $pokemonRepository->findByListOfId(array($id_type_eau[0]->getId()));
        $nb_rand = rand(0,9);
        if($appat=='faible'){
            $dropabble_peche=['beaucoup','peu','peu','peu','peu','pokemon','pokemon','pokemon','chaussette','algue'];
            $prix = -500;
            $niv_min = 15;
            $niv_max = 26;
        }
        elseif($appat=='moyen'){
            $dropabble_peche=['beaucoup','beaucoup','peu','peu','pokemon','pokemon','pokemon','pokemon','chaussette','algue'];
            $prix = -1000;
            $niv_min = 25;
            $niv_max = 41;

        }
        elseif($appat=='fort'){
            $dropabble_peche=['beaucoup','beaucoup','beaucoup','peu','doublePokemon','doublePokemon','pokemon','pokemon','pokemon','chaussette'];
            $prix = -2000;
            $niv_min = 40;
            $niv_max = 61;

        }
        if($dresseur->getArgent()<$prix){
            $msg = 'argentManquant';
            $info = ['Vous n\'avez pas assez d\'argent pour pêcher avec cet appât'];
        }
        else{
            switch ($dropabble_peche[$nb_rand]) {
                case 'beaucoup':
                    $gain = abs($prix)*3;
                    $prix = $prix + $gain;
                    $res = 'beaucoup';
                    $info = ['Bravo vous avez pêché un coffre rempli d\'argent et vous avez gagné '.$gain.' !'];
                    break;
                case 'peu':
                    $gain = abs($prix);
                    $prix = 0;
                    $res = 'peu';
                    $info = ['Bravo vous avez pêché une petite bourse remplie d\'argent et vous avez gagné '.$gain.' !'];
                    break;
                case 'pokemon':
                    $pokemonDresseur = addNewPokemonEau($list_pokemon_eau, $dresseur, $niv_min, $niv_max, $pokemonDresseurRepository);
                    $res = 'pokemon';
                    $info = [$pokemonDresseur];
                    break;
                case 'doublePokemon':
                    $pokemonDresseur = addNewPokemonEau($list_pokemon_eau, $dresseur, $niv_min, $niv_max, $pokemonDresseurRepository);
                    $pokemonDresseur2 = addNewPokemonEau($list_pokemon_eau, $dresseur, $niv_min, $niv_max, $pokemonDresseurRepository);
                    $res = 'doublePokemon';
                    $info = [$pokemonDresseur, $pokemonDresseur2];
                    break;
                case 'chaussette':
                    $res = 'chaussette';
                    $info = ['Tu as peché une chaussette autant te dire que tu n\'as rien gagné rentente ta chance !'];
                    break;
                case 'algue':
                    $res = 'algue';
                    $info = ['Tu as peché une algue autant te dire que tu n\'as rien gagné rentente ta chance !'];
                    break;
            }
            $dresseur->setArgent($dresseur->getArgent()+$prix);
        }
        return $this->render('peche/resultat.html.twig', [
            'res' => $res,
            'info' => $info,
        ]);
    }
}
