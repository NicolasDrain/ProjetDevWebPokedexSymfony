<?php

namespace App\Controller;

use App\Entity\Dresseur;
use App\Entity\PokemonDresseur;
use App\Entity\Pokemon;
use App\Entity\Vente;
use App\Form\VenteType;
use App\Repository\VenteRepository;
use App\Repository\PokemonDresseurRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function new(Request $request, VenteRepository $venteRepository, PokemonDresseurRepository $pokemonDresseurRepository ): Response
    {
        $dresseur = $this->getUser();
        $list_pokemonDresseur = $pokemonDresseurRepository->findPokemonDresseurUnsold($dresseur);
        $form = $this->createForm(VenteType::class, ['listPokemonDresseur' => $list_pokemonDresseur]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $pokemonDresseur = $task['pokemonDresseur'];
            $prix = $task['prix'];
            $vente = new Vente();
            $vente->setIdDresseur($dresseur);
            $vente->setIdPokemonDresseur($pokemonDresseur);
            $vente->setPrix($prix);
            $vente->setStatut('En cours');
            $venteRepository->add($vente, true);
            return $this->redirectToRoute('app_vente_mesVentes');
        }
        return $this->render('vente/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/delete/{id}', name: 'delete')]
    #[Security("is_granted('ROLE_USER') and user === vente.getIdDresseur()")]
    public function delete(Vente $vente, VenteRepository $venteRepository): Response
    {
        $venteRepository->remove($vente, true);
        return $this->redirectToRoute('app_vente_mesVentes');
    }
}

