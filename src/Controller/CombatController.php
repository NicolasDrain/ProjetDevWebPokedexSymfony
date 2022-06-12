<?php

namespace App\Controller;

use App\Repository\PokemonRepository;
use App\Repository\PokemonDresseurRepository;
use App\Repository\DresseurRepository;
use App\Entity\PokemonDresseur;
use App\Entity\Dresseur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/combat', name: 'app_combat_')]
#[IsGranted('ROLE_USER')]
class CombatController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(PokemonDresseurRepository $pokemonDresseurRepository): Response
    {
        $dresseur = $this->getUser();
        $list_pokemon_disponible = $pokemonDresseurRepository->findPokemonAvailable($dresseur);
        return $this->render('combat/index.html.twig', [
            'listPokemonDisponible' => $list_pokemon_disponible,
        ]);
    }

    #[Route('/{id}', name: 'choix')]
    #[Security("is_granted('ROLE_USER') and user === pokemonDresseur.getIdDresseur()")]
    public function choix_combat(PokemonDresseur $pokemonDresseur, PokemonRepository $pokemonRepository): Response
    {
        $list_pokemon = $pokemonRepository->findAll();
        $list_pokemon_combat = [] ;
        $pokemon = $list_pokemon[rand(0,150)];
        $niveau = rand($pokemonDresseur->getNiveau()-10, $pokemonDresseur->getNiveau()+2);
        if($niveau<=0){
            $niveau=1;
        }
        if($niveau>100){
            $niveau=100;
        }
        $gainExpMin = ($pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()+1)-$pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()))*0.5;
        $gainExpMax = $pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()+2)-$pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau());
        $gainArgentMin = 500 ;
        $gainArgentMax = 1000;
        $pokemon1 = ['pokemon' => $pokemon, 'niveau' => $niveau, 'difficulte' => 'Facile', 'gainExpMin' => $gainExpMin, 'gainExpMax' => $gainExpMax, 'gainArgentMin' => $gainArgentMin, 'gainArgentMax' => $gainArgentMax, 'chance' => '90'];
        array_push($list_pokemon_combat, $pokemon1);
        $pokemon = $list_pokemon[rand(0,150)];
        $niveau = rand($pokemonDresseur->getNiveau()+3, $pokemonDresseur->getNiveau()+15);
        if($niveau<=0){
            $niveau=1;
        }
        if($niveau>100){
            $niveau=100;
        }
        $gainExpMin = ($pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()+1)-$pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()));
        $gainExpMax = $pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()+3)-$pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau());
        $gainArgentMin = 1500 ;
        $gainArgentMax = 2500;
        $pokemon2 = ['pokemon' => $pokemon, 'niveau' => $niveau, 'difficulte' => 'Moyenne', 'gainExpMin' => $gainExpMin, 'gainExpMax' => $gainExpMax, 'gainArgentMin' => $gainArgentMin, 'gainArgentMax' => $gainArgentMax, 'chance' => '60'];
        array_push($list_pokemon_combat, $pokemon2);
        $pokemon = $list_pokemon[rand(0,150)];
        $niveau = rand($pokemonDresseur->getNiveau()+15, $pokemonDresseur->getNiveau()+30);
        if($niveau<=0){
            $niveau=1;
        }
        if($niveau>100){
            $niveau=100;
        }
        $gainArgentMin = 4000 ;
        $gainArgentMax = 8000;
        $gainExpMin = ($pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()+4)-$pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()));
        $gainExpMax = $pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()+8)-$pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau());
        $pokemon3 = ['pokemon' => $pokemon, 'niveau' => $niveau, 'difficulte' => 'Difficile', 'gainExpMin' => $gainExpMin, 'gainExpMax' => $gainExpMax, 'gainArgentMin' => $gainArgentMin, 'gainArgentMax' => $gainArgentMax, 'chance' => '20'];
        array_push($list_pokemon_combat, $pokemon3);
        return $this->render('combat/choixCombat.html.twig', [
            'listPokemonCombat' => $list_pokemon_combat,
            'pokemonDresseur' => $pokemonDresseur,
        ]);
    }

    #[Route('/{id}/{difficulte}', name: 'resultat')]
    #[Security("is_granted('ROLE_USER') and user === pokemonDresseur.getIdDresseur()")]
    public function resultat(PokemonDresseur $pokemonDresseur, PokemonDresseurRepository $pokemonDresseurRepository, DresseurRepository $dresseurRepository, PokemonRepository $pokemonRepository, string $difficulte): Response
    {
        $dresseur = $this->getUser();
        $nb = rand(1,10);
        $gainExp = 0 ;
        $gainArgent = 0;
        $has_evolved = false;
        $anciennePhoto = $pokemonDresseur->getIdPokemon()->getPhoto();
        $ancienNiveau = $pokemonDresseur->getNiveau();
        $ancienNomPoke = $pokemonDresseur->getIdPokemon()->getNom();
        switch ($difficulte) {
            case 'Facile':
                if($nb<=1){
                    $msg = 'defaite';
                    break;
                }
                $msg = 'victoire';
                $gainExpMin = ($pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()+1)-$pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()))*0.5;
                $gainExpMax = $pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()+2)-$pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau());
                $gainArgentMin = 500 ;
                $gainArgentMax = 1000;
                break;
            case 'Moyenne':
                if($nb<=4){
                    $msg = 'defaite';
                    break;
                }
                $msg = 'victoire';
                $gainExpMin = ($pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()+1)-$pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()));
                $gainExpMax = $pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()+3)-$pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau());
                $gainArgentMin = 1500 ;
                $gainArgentMax = 2500;
                break;
            case 'Difficile':
                if($nb<=8){
                    $msg = 'defaite';
                    break;
                }
                $msg = 'victoire';
                $gainArgentMin = 4000 ;
                $gainArgentMax = 8000;
                $gainExpMin = ($pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()+4)-$pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()));
                $gainExpMax = $pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()+8)-$pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau());
                break;
        }
        if($msg == 'victoire'){
            $gainExp = rand($gainExpMin, $gainExpMax);
            $gainArgent = rand($gainArgentMin, $gainArgentMax);
            $pokemonDresseur->setExp($pokemonDresseur->getExp()+$gainExp);
            $pokemonDresseur->setDateTimeDerniereActivite(new \DateTime());
            //On vérifie si le pokémon peut évoluer et si oui on le fait évoluer
            if($pokemonDresseur->canEvolve() and $pokemonDresseur->getNiveau()-$ancienNiveau>=1){
                if($pokemonDresseur->getIdPokemon()->getNom() == 'Evoli'){
                    $nb = rand(1,3);
                }
                else{
                    $nb = 1;
                }
                $pokemon = $pokemonRepository->find($pokemonDresseur->getIdPokemon()->getId()+$nb);
                $pokemonDresseur->makeEvolve($pokemon);
                $has_evolved = true;
            }
            //fin de vérification de l'évolution
            $dresseur->setArgent($dresseur->getArgent()+$gainArgent);
            $dresseurRepository->add($dresseur, true);
        }
        $pokemonDresseur->setDateTimeDerniereActivite(new \DateTime());
        $pokemonDresseurRepository->add($pokemonDresseur, true);
        return $this->render('combat/resultat.html.twig', [
            'msg' => $msg,
            'pokemonDresseur' => $pokemonDresseur,
            'gainExp' => $gainExp,
            'gainArgent' => $gainArgent,
            'has_evolved' => $has_evolved,
            'ancienNomPoke' => $ancienNomPoke,
            'anciennePhoto' => $anciennePhoto,
            'ancienNiveau' => $ancienNiveau,
            

        ]);
    }
}
