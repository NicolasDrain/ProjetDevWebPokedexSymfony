<?php

namespace App\Controller;

use App\Entity\Dresseur;
use App\Entity\Vente;
use App\Form\VenteType;
use App\Repository\VenteRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/vente', name: 'app_vente_')]
#[IsGranted('ROLE_USER')]
class VenteController extends AbstractController
{
    #[Route('/', name: 'mesVentes')]
    public function index(VenteRepository $venteRepository): Response
    {
        $dresseur = $this->getUser();
        $ventesEnCours = $venteRepository->findBy(array('id_dresseur' => $dresseur, 'statut' => 'En cours'));
        $ventesTerminee = $venteRepository->findBy(array('id_dresseur' => $dresseur, 'statut' => 'Terminee'));
        return $this->render('vente/index.html.twig', [
            'ventesEnCours' => $ventesEnCours,
            'ventesTerminee' => $ventesTerminee,
        ]);
    }

    #[Route('/new', name: 'new')]
    public function new(): Response
    {
        $dresseur = $this->getUser();
        $list_pokemonDresseur = $dresseur->getPokemonDresseurs();
        $form = $this->createForm(VenteType::class, ['listPokemonDresseur' => $list_pokemonDresseur]);
        return $this->render('vente/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/update/{id}', name: 'update')]
    #[Security("is_granted('ROLE_USER') and user === vente.getIdDresseur()")]
    public function newVente(Vente $vente): Response
    {
        return $this->render('vente/index.html.twig', [
            'controller_name' => 'VenteController',
        ]);
    }

    #[Route('/addVente', name: 'addVente')]
    public function addVente(): Response
    {
        return $this->render('vente/index.html.twig', [
            'controller_name' => 'VenteController',
        ]);
    }
}
