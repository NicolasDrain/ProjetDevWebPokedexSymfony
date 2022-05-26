<?php

namespace App\Controller;

use App\Entity\Dresseur;
use App\Form\DresseurType;
use App\Repository\DresseurRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dresseur')]
#[IsGranted('ROLE_ADMIN')]
class DresseurController extends AbstractController
{
    #[Route('/', name: 'app_dresseur_index', methods: ['GET'])]
    public function index(DresseurRepository $dresseurRepository): Response
    {
        return $this->render('admin/dresseur/index.html.twig', [
            'dresseurs' => $dresseurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_dresseur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DresseurRepository $dresseurRepository): Response
    {
        $dresseur = new Dresseur();
        $form = $this->createForm(DresseurType::class, $dresseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dresseurRepository->add($dresseur, true);

            return $this->redirectToRoute('app_dresseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/dresseur/new.html.twig', [
            'dresseur' => $dresseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dresseur_show', methods: ['GET'])]
    public function show(Dresseur $dresseur): Response
    {
        return $this->render('admin/dresseur/show.html.twig', [
            'dresseur' => $dresseur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_dresseur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Dresseur $dresseur, DresseurRepository $dresseurRepository): Response
    {
        $form = $this->createForm(DresseurType::class, $dresseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dresseurRepository->add($dresseur, true);

            return $this->redirectToRoute('app_dresseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/dresseur/edit.html.twig', [
            'dresseur' => $dresseur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dresseur_delete', methods: ['POST'])]
    public function delete(Request $request, Dresseur $dresseur, DresseurRepository $dresseurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dresseur->getId(), $request->request->get('_token'))) {
            $dresseurRepository->remove($dresseur, true);
        }

        return $this->redirectToRoute('app_dresseur_index', [], Response::HTTP_SEE_OTHER);
    }
}
