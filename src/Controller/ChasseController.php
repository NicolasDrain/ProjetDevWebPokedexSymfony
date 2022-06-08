<?php

namespace App\Controller;

use App\Repository\PokemonRepository;
use App\Repository\PokemonDresseurRepository;
use App\Repository\RegionRepository;
use App\Repository\CaptureRepository;
use App\Entity\PokemonDresseur;
use App\Entity\Capture;
use App\Entity\Pokemon;
use App\Entity\Dresseur;
use App\Entity\Region;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[IsGranted('ROLE_USER')]
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

    #[Security("is_granted('ROLE_USER') and user === pokemonDresseur.getIdDresseur()")]
    #[Route('/{id}', name: 'choix_region')]
    public function choixRegion(PokemonDresseur $pokemonDresseur): Response
    {
        if(!$pokemonDresseur->isAvailable()){
            return $this->redirectToRoute('app_entrainement_pokemon_indisponible',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('chasse/index.html.twig', [
            'controller_name' => 'ChasseController',
        ]);
    }

    #[Security("is_granted('ROLE_USER') and user === pokemonDresseur.getIdDresseur()")]
    #[Route('/{id}/{nom_region}', name: 'final')]
    public function chasse(PokemonDresseur $pokemonDresseur, RegionRepository $regionRepository, CaptureRepository $captureRepository, PokemonRepository $pokemonRepository, PokemonDresseurRepository $pokemonDresseurRepository, string $nom_region): Response
    {
        if(!$pokemonDresseur->isAvailable()){
            return $this->redirectToRoute('app_entrainement_pokemon_indisponible',[], Response::HTTP_SEE_OTHER);
        }
        $region = $regionRepository->findBy(array('nom' => $nom_region))[0];
        $captures = $captureRepository->findBy(array('id_region' => $region->getId()));
        $types = [];
        foreach($captures as $capture){
            array_push($types, $capture->getIdType()->getId());
        }
        $pokemon_capturable = $pokemonRepository->findByListOfId($types);
        $pokemon = $pokemonRepository->findOneBy(array("id" => rand(1, count($pokemon_capturable))));
        $dresseur = $this->getUser();
        $newPokemonDresseur = new PokemonDresseur();
        $newPokemonDresseur->setIdPokemon($pokemon);
        $newPokemonDresseur->setIdDresseur($dresseur);
        if($pokemonDresseur->getNiveau()<=5){
            $newPokemonDresseur->setExp(rand(0,$newPokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()+2)));
        }
        elseif($pokemonDresseur->getNiveau()>=98){
            $newPokemonDresseur->setExp(rand($newPokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()-5),$newPokemonDresseur->getExpByNiveau(100)));
        }
        else{
            $newPokemonDresseur->setExp(rand($newPokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()-5),$newPokemonDresseur->getExpByNiveau($pokemonDresseur->getNiveau()+2)));
        }
        $pokemonDresseur->setDateTimeDerniereActivite(new \DateTime());
        $pokemonDresseurRepository->add($pokemonDresseur, true);
        $pokemonDresseurRepository->add($newPokemonDresseur, true);
        return $this->render('chasse/resultat.html.twig', [
            'newPokemonDresseur' => $newPokemonDresseur,
            'pokemonDresseur' => $pokemonDresseur,
            'nomRegion' => $nom_region,
            'niveau' => $newPokemonDresseur->getNiveau(),

        ]);
    }
}
