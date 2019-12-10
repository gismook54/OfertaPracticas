<?php

namespace App\Controller;

use App\Entity\Aspirante;
use App\Entity\AspiranteOfertaPracticaProfecional;
use App\Entity\Estatus;
use App\Entity\OfertaPracticaProfesional;
use App\Entity\Roles;
use App\Form\AspiranteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/aspirante")
 */
class AspiranteController extends AbstractController
{
    /**
     * @Route("/", name="aspirante_index", methods={"GET"})
     */
    public function index(Request $request): Response
    {
        /*
        $aspirantes = $this->getDoctrine()
            ->getRepository(Aspirante::class)
            ->findAll();

        return $this->render('aspirante/index.html.twig', [
            'aspirantes' => $aspirantes,
        ]);*/
        $session = $request->getSession();
        $session->start();
        $aspirante = $session->get('aspirante');

        $ofertaPractica = $this->getDoctrine()
            ->getRepository(AspiranteOfertaPracticaProfecional::class)
            ->findBy(array('idAspirante' => $aspirante->getIdAspirante()));;

        if ($aspirante) {
            return $this->render('aspirante/home_aspirante.html.twig', [
                'username' => $aspirante->getNombre(),'oferta_practicaS' => $ofertaPractica
            ]);
        }
    }

    /**
     * @Route("/oferta", name="aspirante_oferta", methods={"GET","POST"})
     */
    public function oferta(Request $request): Response
    {
        $session = $request->getSession();
        $session->start();
        //$usuarioInstitucion = $session->get('usuarioInstitucion');

        $ofertaPracticaProfesionals = $this->getDoctrine()
            ->getRepository(OfertaPracticaProfesional::class)
            ->findBy(array('idEstatus' => '1'));;

        return $this->render('aspirante/lista_ofertas_practicas.html.twig', [
            'oferta_practica_profesionals' => $ofertaPracticaProfesionals,
        ]);
    }

    /**
     * @Route("/{idOfertaPracticaProfesional}/detalle_oferta", name="aspirante_detalle_oferta", methods={"GET","POST"})
     */
    public function detalle_oferta(Request $request,OfertaPracticaProfesional $ofertaPracticaProfesional): Response
    {
        //$session = $request->getSession();
        //$session->start();
        return $this->render('aspirante/show_oferta_practica.html.twig', [
            'oferta_practica_profesional' => $ofertaPracticaProfesional,
        ]);
    }

    /**
     * @Route("/{idOfertaPracticaProfesional}/postulacion", name="aspirante_postulacion", methods={"GET","POST"})
     */
    public function postulacion(Request $request,OfertaPracticaProfesional $ofertaPracticaProfesional): Response
    {
        $session = $request->getSession();
        $session->start();
        $id = $session->get('aspirante')->getIdAspirante();

        $entityManager = $this->getDoctrine()->getManager();
        $aspirante = $entityManager->getRepository(Aspirante::class)->find($id);
        $status = $entityManager->getRepository(Estatus::class)->find(1);

        $ofertaPractica = new AspiranteOfertaPracticaProfecional();
        $ofertaPractica->setIdAspirante($aspirante);
        $ofertaPractica->setIdOfertaPracticaProfecional($ofertaPracticaProfesional);
        $ofertaPractica->setIdEstatus($status);
        $ofertaPractica->setFechaRegistro(new \DateTime());
        $entityManager->persist($ofertaPractica);
        $entityManager->flush();

        return $this->redirectToRoute('aspirante_index');

    }
    /**
     * @Route("/new", name="aspirante_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $aspirante = new Aspirante();
        $form = $this->createForm(AspiranteType::class, $aspirante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $entityManager = $this->getDoctrine()->getManager();
                $status = $entityManager->getRepository(Estatus::class)->find(1);
                $rol = $entityManager->getRepository(Roles::class)->find(1);

                $aspirante->setIdEstatus($status);
                $aspirante->setIdRol($rol);

                $entityManager->persist($aspirante);
                $entityManager->flush();
                //Va al login
                //return $this->redirectToRoute('index');
                return $this->render('security/index.html.twig', [
                    'username' => $aspirante->getUsuario(),'registrado' => true,'error_autenticacion' => false
                ]);
            }catch(\Exception $e){
                return $this->render('aspirante/new.html.twig', [
                    'aspirante' => $aspirante,
                    'form' => $form->createView(),
                    'msg' => "El usuario ya se encuentra registrado"
                ]);
            }
        }

        return $this->render('aspirante/new.html.twig', [
            'aspirante' => $aspirante,
            'form' => $form->createView(),
            'msg' => null
        ]);
    }

    /**
     * @Route("/{idAspirante}", name="aspirante_show", methods={"GET"})
     */
    public function show(Aspirante $aspirante): Response
    {
        return $this->render('aspirante/show.html.twig', [
            'aspirante' => $aspirante,
        ]);
    }

    /**
     * @Route("/{idAspirante}/edit", name="aspirante_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Aspirante $aspirante): Response
    {
        $form = $this->createForm(AspiranteType::class, $aspirante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('aspirante_index');
        }

        return $this->render('aspirante/edit.html.twig', [
            'aspirante' => $aspirante,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idAspirante}", name="aspirante_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Aspirante $aspirante): Response
    {
        if ($this->isCsrfTokenValid('delete'.$aspirante->getIdAspirante(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($aspirante);
            $entityManager->flush();
        }

        return $this->redirectToRoute('aspirante_index');
    }
}
