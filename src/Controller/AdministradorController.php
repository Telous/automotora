<?php

namespace App\Controller;

use App\Entity\Administrador;
use App\Form\AdministradorType;
use App\Repository\AdministradorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administrador")
 */
class AdministradorController extends AbstractController
{
    /**
     * @Route("/todos", name="administrador_all", methods={"GET"})
     */
    public function index(AdministradorRepository $administradorRepository): Response
    {
        $title = "Administrador index";

        return $this->render('administrador/index.html.twig', [
            'administradors' => $administradorRepository->findAll(),
            'title' => $title
        ]);
    }

    /**
     * @Route("/nuevo", name="administrador_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $administrador = new Administrador();
        $form = $this->createForm(AdministradorType::class, $administrador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($administrador);
            $entityManager->flush();

            $this->addFlash('success','Datos Almacenados!');
            return $this->redirectToRoute('administrador_all');
        }

        return $this->render('administrador/administrador.html.twig', [
            'administrador' => $administrador,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/editar", name="administrador_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Administrador $administrador): Response
    {
        $form = $this->createForm(AdministradorType::class, $administrador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('info','Datos Modificados!');
            return $this->redirectToRoute('administrador_all');
        }

        return $this->render('administrador/administrador.html.twig', [
            'administrador' => $administrador,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="administrador_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Administrador $administrador): Response
    {
        if ($this->isCsrfTokenValid('delete'.$administrador->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($administrador);
            $entityManager->flush();
        }

        $this->addFlash('danger','Datos Eliminados!');
        return new Response;
    }
}
