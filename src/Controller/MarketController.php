<?php

namespace App\Controller;

use App\Repository\VenteRepository;
use App\Repository\DresseurRepository;
use App\Repository\PokemonDresseurRepository;
use App\Entity\Vente;
use App\Entity\PokemonDresseur;
use App\Entity\Pokemon;
use App\Entity\Dresseur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/market', name: 'app_market_')]
#[IsGranted('ROLE_USER')]
class MarketController extends AbstractController
{
    #[Route('/', name: 'list')]
    public function index(VenteRepository $venteRepository): Response
    {
        $dresseur = $this->getUser();
        $list_vente = $venteRepository->findPokemonBuyable($dresseur);
        return $this->render('market/index.html.twig', [
            'list_vente' => $list_vente,
        ]);
    }

    #[Route('/{id}', name: 'detail')]
    public function detail(Vente $vente): Response
    {
        $niveau = $vente->getIdPokemonDresseur()->getNiveau();
        return $this->render('market/detail.html.twig', [
            'vente' => $vente,
            'niveau' => $niveau,
        ]);
    }

    #[Route('/{id}/achat', name: 'achat')]
    public function achat(Vente $vente,VenteRepository $venteRepository, DresseurRepository $dresseurRepository, PokemonDresseurRepository $pokemonDresseurRepository): Response
    {
        $dresseur = $this->getUser();
        if($vente->getIdDresseur() === $dresseur){
            $msg = 'Vous ne pouvez pas acheter un de vos pokémons !';
            return $this->render('market/achat.html.twig', [
                'msg' => $msg,
            ]);
        }
        elseif($vente->getPrix() > $dresseur->getArgent()){
            $msg = 'Vous n\'avez pas assez d\'argent pour acheter ce pokemon !';
            return $this->render('market/achat.html.twig', [
                'msg' => $msg,
            ]);
        }
        elseif($vente->getStatut() == 'Terminee'){
            $msg = 'Vous essayez d\'acheter un pokemon déjà vendu !';
            return $this->render('market/achat.html.twig', [
                'msg' => $msg,
            ]);
        }
        else{
            $dresseurVendeur = $vente->getIdDresseur();
            $dresseurVendeur->setArgent($dresseurVendeur->getArgent()+$vente->getPrix());
            $pokemonDresseur = $vente->getIdPokemonDresseur();
            $pokemonDresseur->setIdDresseur($dresseur);
            $dresseur->setArgent($dresseur->getArgent()-$vente->getPrix());
            $vente->setStatut('Terminee');
            $dresseurRepository->add($dresseurVendeur, true);
            $pokemonDresseurRepository->add($pokemonDresseur, true);
            $dresseurRepository->add($dresseur, true);
            $venteRepository->add($vente, true);
            $niveau = $pokemonDresseur->getNiveau();
            $msg = '';
        }
        return $this->render('market/achat.html.twig', [
            'msg' => $msg,
            'vente' => $vente,
            'pokemonDresseur' => $pokemonDresseur,
            'dresseur' => $dresseur,
            'dresseurVendeur' => $dresseurVendeur,
            'niveau' => $niveau,
        ]);
    }
}
