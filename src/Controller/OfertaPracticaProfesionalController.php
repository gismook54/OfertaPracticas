<?php

namespace App\Controller;

use App\Entity\OfertaPracticaProfesional;
use App\Entity\AspiranteOfertaPracticaProfecional;
use App\Entity\Modalidad;
use App\Entity\Institucion;
use App\Entity\Estatus;
use App\Form\OfertaPracticaProfesionalType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\UsuarioInstitucion;
/**
 * @Route("/oferta/practica/profesional")
 */
class OfertaPracticaProfesionalController extends AbstractController
{
    /**
     * @Route("/", name="oferta_practica_profesional_index", methods={"GET"})
     */
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $session->start();
        //UsuarioInstitucion: $usuarioInstitucion = new UsuarioInstitucion();
        $usuarioInstitucion = $session->get('usuarioInstitucion');

        $ofertaPracticaProfesionals = $this->getDoctrine()
            ->getRepository(OfertaPracticaProfesional::class)
            ->findBy(array('idInstitucion' => $usuarioInstitucion->getIdInstitucion()->getIdInstitucion()));;

        return $this->render('oferta_practica_profesional/index.html.twig', [
            'oferta_practica_profesionals' => $ofertaPracticaProfesionals,
        ]);
    }

    /**
     * @Route("/{idOfertaPracticaProfesional}/lista_oferta_aspirante", name="oferta_practica_profesional_lista_oferta_aspirante", methods={"GET","POST"})
     */
    public function lista_oferta_aspirante(OfertaPracticaProfesional $ofertaPracticaProfesional): Response
    {
        $aspiranteOfertaPracticaProfecional = $this->getDoctrine()
            ->getRepository(AspiranteOfertaPracticaProfecional::class)
            ->findAll();

        return $this->render('oferta_practica_profesional/lista_oferta_aspirante.html.twig', [
            'aspirante_oferta_practica_profecional' => $aspiranteOfertaPracticaProfecional,
        ]);
    }

    /**
     * @Route("/new", name="oferta_practica_profesional_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ofertaPracticaProfesional = new OfertaPracticaProfesional();
        $form = $this->createForm(OfertaPracticaProfesionalType::class, $ofertaPracticaProfesional);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();

            $modalidad = $entityManager->getRepository(Modalidad::class)->find(1);
            $institucion = $entityManager->getRepository(Institucion::class)->find(1);
            $status = $entityManager->getRepository(Estatus::class)->find(1);

            $ofertaPracticaProfesional->setIdModalidad($modalidad);
            $ofertaPracticaProfesional->setIdInstitucion($institucion);
            $ofertaPracticaProfesional->setIdEstatus($status);

            $entityManager->persist($ofertaPracticaProfesional);
            $entityManager->flush();

            return $this->redirectToRoute('oferta_practica_profesional_index');
        }

        return $this->render('oferta_practica_profesional/new.html.twig', [
            'oferta_practica_profesional' => $ofertaPracticaProfesional,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idOfertaPracticaProfesional}", name="oferta_practica_profesional_show", methods={"GET"})
     */
    public function show(OfertaPracticaProfesional $ofertaPracticaProfesional): Response
    {
        return $this->render('oferta_practica_profesional/show.html.twig', [
            'oferta_practica_profesional' => $ofertaPracticaProfesional,
        ]);
    }

    /**
     * @Route("/{idOfertaPracticaProfesional}/edit", name="oferta_practica_profesional_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, OfertaPracticaProfesional $ofertaPracticaProfesional): Response
    {
        $form = $this->createForm(OfertaPracticaProfesionalType::class, $ofertaPracticaProfesional);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('oferta_practica_profesional_index');
        }

        return $this->render('oferta_practica_profesional/edit.html.twig', [
            'oferta_practica_profesional' => $ofertaPracticaProfesional,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idOfertaPracticaProfesional}", name="oferta_practica_profesional_delete", methods={"DELETE"})
     */
    public function delete(Request $request, OfertaPracticaProfesional $ofertaPracticaProfesional): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ofertaPracticaProfesional->getIdOfertaPracticaProfesional(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ofertaPracticaProfesional);
            $entityManager->flush();
        }

        return $this->redirectToRoute('oferta_practica_profesional_index');
    }
}
