<?php

namespace App\Controller;

use App\Entity\PokemonDresseur;
use App\Repository\PokemonDresseurRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntrainementController extends AbstractController
{
    #[Route('/entrainement', name: 'app_entrainement')]
    #[IsGranted('ROLE_USER')]
    public function index(): Response
    {
        return $this->render('entrainement/index.html.twig', [
            'controller_name' => 'EntrainementController',
        ]);
    }

    #[Route('/entrainement/{id}', name: 'app_entrainement_pokemon', )]
    #[Security("is_granted('ROLE_USER') and user === pokemonDresseur.getIdDresseur()")]
    public function entrainement(PokemonDresseur $pokemonDresseur, PokemonDresseurRepository $pokemonDresseurRepository): Response
    {
        if(!$pokemonDresseur->isAvailable()){
            return $this->redirectToRoute('app_entrainement_pokemon_indisponible',[], Response::HTTP_SEE_OTHER);
        }
        $exp_gagne=rand(10,30);
        $pokemonDresseur->setExp($pokemonDresseur->getExp()+$exp_gagne);
        $pokemonDresseur->setDateTimeDerniereActivite(new \DateTime());
        $niveau = $pokemonDresseur->getNiveau();
        $pokemonDresseurRepository->add($pokemonDresseur, true);
        return $this->render('entrainement/resultatBon.html.twig', [
            'pokemonDresseur' => $pokemonDresseur,
            'niveau' => $niveau,
            'exp_gagne' => $exp_gagne,
        ]);
    }

    #[Route('indisponible', name: 'app_entrainement_pokemon_indisponible')]
    #[IsGranted('ROLE_USER')]
    public function resultatMauvais(): Response
    {
        return $this->render('entrainement/resultatMauvais.html.twig');
    }
}
