<?php

namespace App\Controller;

use App\Entity\PokemonDresseur;
use App\Repository\PokemonDresseurRepository;
use App\Repository\PokemonRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntrainementController extends AbstractController
{
    #[Route('/entrainement', name: 'app_entrainement')]
    #[IsGranted('ROLE_USER')]
    public function index(PokemonDresseurRepository $pokemonDresseurRepository): Response
    {
        $dresseur = $this->getUser();
        $list_pokemon_disponible = $pokemonDresseurRepository->findPokemonAvailable($dresseur);
        return $this->render('entrainement/index.html.twig', [
            'listPokemonDisponible' => $list_pokemon_disponible,
        ]);
    }

    #[Route('/entrainement/{id}', name: 'app_entrainement_pokemon', )]
    #[Security("is_granted('ROLE_USER') and user === pokemonDresseur.getIdDresseur()")]
    public function entrainement(PokemonDresseur $pokemonDresseur, PokemonDresseurRepository $pokemonDresseurRepository, PokemonRepository $pokemonRepository): Response
    {
        if(!$pokemonDresseur->isAvailable()){
            return $this->redirectToRoute('app_entrainement_pokemon_indisponible',[], Response::HTTP_SEE_OTHER);
        }
        $anciennePhoto = $pokemonDresseur->getIdPokemon()->getPhoto();
        $ancienNiveau = $pokemonDresseur->getNiveau();
        $ancienNomPoke = $pokemonDresseur->getIdPokemon()->getNom();
        $p1 = ($pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()+1)-$pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()))*0.6;
        $p2 = $pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()+2)-$pokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau());
        $exp_gagne=rand($p1,$p2);
        $pokemonDresseur->setExp($pokemonDresseur->getExp()+$exp_gagne);
        $pokemonDresseur->setDateTimeDerniereActivite(new \DateTime());
        $niveau = $pokemonDresseur->getNiveau();
        //On v??rifie si le pok??mon peut ??voluer et si oui on le fait ??voluer
        if($pokemonDresseur->canEvolve() and $niveau-$ancienNiveau>=1){
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
        else{
            $has_evolved = false;
        }
        //fin de v??rification de l'??volution
        $pokemonDresseurRepository->add($pokemonDresseur, true);
        return $this->render('entrainement/resultatBon.html.twig', [
            'has_evolved' => $has_evolved,
            'pokemonDresseur' => $pokemonDresseur,
            'ancienNiveau' => $ancienNiveau,
            'niveau' => $niveau,
            'exp_gagne' => $exp_gagne,
            'ancienNomPoke' => $ancienNomPoke,
            'anciennePhoto' => $anciennePhoto,
        ]);
    }

    #[Route('indisponible', name: 'app_entrainement_pokemon_indisponible')]
    #[IsGranted('ROLE_USER')]
    public function resultatMauvais(): Response
    {
        return $this->render('entrainement/resultatMauvais.html.twig');
    }
}
