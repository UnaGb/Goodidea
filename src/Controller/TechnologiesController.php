<?php

namespace App\Controller;

use App\Entity\Technologies;
use App\Form\TechnologiesType;
use App\Repository\TechnologiesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/technologies')]
class TechnologiesController extends AbstractController
{
    #[Route('/', name: 'technologies_index', methods: ['GET'])]
    public function index(TechnologiesRepository $technologiesRepository): Response
    {
        return $this->render('technologies/index.html.twig', [
            'technologies' => $technologiesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'technologies_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $technology = new Technologies();
        $form = $this->createForm(TechnologiesType::class, $technology);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($technology);
            $entityManager->flush();

            return $this->redirectToRoute('technologies_index');
        }

        return $this->render('technologies/new.html.twig', [
            'technology' => $technology,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'technologies_show', methods: ['GET'])]
    public function show(Technologies $technology): Response
    {
        return $this->render('technologies/show.html.twig', [
            'technology' => $technology,
        ]);
    }

    #[Route('/{id}/edit', name: 'technologies_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Technologies $technology): Response
    {
        $form = $this->createForm(TechnologiesType::class, $technology);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('technologies_index');
        }

        return $this->render('technologies/edit.html.twig', [
            'technology' => $technology,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'technologies_delete', methods: ['POST'])]
    public function delete(Request $request, Technologies $technology): Response
    {
        if ($this->isCsrfTokenValid('delete'.$technology->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($technology);
            $entityManager->flush();
        }

        return $this->redirectToRoute('technologies_index');
    }
}
