<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Form\PokemonType;
use App\Repository\PokemonRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/pokemon')]
#[IsGranted('ROLE_ADMIN')]
class PokemonController extends AbstractController
{
    #[Route('/', name: 'app_pokemon_index', methods: ['GET'])]
    public function index(PokemonRepository $pokemonRepository): Response
    {
        return $this->render('admin/pokemon/index.html.twig', [
            'pokemon' => $pokemonRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pokemon_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PokemonRepository $pokemonRepository): Response
    {
        $pokemon = new Pokemon();
        $form = $this->createForm(PokemonType::class, $pokemon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pokemonRepository->add($pokemon, true);

            return $this->redirectToRoute('app_pokemon_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/pokemon/new.html.twig', [
            'pokemon' => $pokemon,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pokemon_show', methods: ['GET'])]
    public function show(Pokemon $pokemon): Response
    {
        return $this->render('admin/pokemon/show.html.twig', [
            'pokemon' => $pokemon,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pokemon_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pokemon $pokemon, PokemonRepository $pokemonRepository): Response
    {
        $form = $this->createForm(PokemonType::class, $pokemon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pokemonRepository->add($pokemon, true);

            return $this->redirectToRoute('app_pokemon_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/pokemon/edit.html.twig', [
            'pokemon' => $pokemon,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pokemon_delete', methods: ['POST'])]
    public function delete(Request $request, Pokemon $pokemon, PokemonRepository $pokemonRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pokemon->getId(), $request->request->get('_token'))) {
            $pokemonRepository->remove($pokemon, true);
        }

        return $this->redirectToRoute('app_pokemon_index', [], Response::HTTP_SEE_OTHER);
    }
}
