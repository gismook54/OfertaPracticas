<?php

namespace App\Controller;

use App\Entity\AspiranteOfertaPracticaProfecional;
use App\Entity\OfertaPracticaProfesional;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Aspirante;
use App\Entity\UsuarioInstitucion;
use Symfony\Component\Console\Input\Input;

class SecurityController extends AbstractController
{
    /**
     * @Route("/security", name="security")
     */
    public function index()
    {
        /*return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);*/

        return $this->render('security/index.html.twig', [
            'username' => '','registrado' => false,'error_autenticacion' => false
        ]);
    }

    public function institucion_loginAction()
    {
        return $this->render('security/institucion_login.html.twig', [
            'registrado' => false,'error_autenticacion' => false
        ]);
    }

    public function loginAction()
    {
        $autenticacionUtil = $this->get("security.authentication_utils");
        $error = $autenticacionUtil->getLastAuthenticationError();
        $ultimoUsuario = $autenticacionUtil->getLastUsername();

        return $this->render('security/index.html.twig', [
            'last_username' => $ultimoUsuario,'error' => $error
        ]);
    }

    public function login_checkAction(Request $request)
    {

        $session = $request->getSession();
        $session->start();

        //Recoger POST
        $usuario = $request->request->get("usuario");
        $password = $request->request->get("password");
        //var_dump("POST:".$var);
        //die();

        $entityManager = $this->getDoctrine()->getManager();
        $aspirante = $entityManager->getRepository(Aspirante::class)->findOneBy(array('usuario' => $usuario));

        if ($aspirante){
            if ($aspirante->getPassword() == $password){
                $session->set('aspirante', $aspirante);
                $surname = $session->get('aspirante');

                $ofertaPractica = $this->getDoctrine()
                    ->getRepository(AspiranteOfertaPracticaProfecional::class)
                    ->findBy(array('idAspirante' => $aspirante->getIdAspirante()));;

                return $this->render('aspirante/home_aspirante.html.twig', [
                    'username' => $aspirante->getNombre(), 'surname' => $surname->getNombre(),'oferta_practicaS' => $ofertaPractica
                ]);
            }
        }
        return $this->render('security/index.html.twig', [
            'username' => '','registrado' => false,'error_autenticacion' => true,
        ]);
    }

    public function loginInstitucion_checkAction(Request $request)
    {

        $session = $request->getSession();
        $session->start();

        //Recoger POST
        $usuario = $request->request->get("usuario");
        $password = $request->request->get("password");
        //var_dump("POST:".$var);
        //die();

        $entityManager = $this->getDoctrine()->getManager();
        $usuarioInstitucion = $entityManager->getRepository(UsuarioInstitucion::class)->findOneBy(array('usuario' => $usuario));

        if ($usuarioInstitucion){
            if ($usuarioInstitucion->getPassword() == $password){
                $session->set('usuarioInstitucion', $usuarioInstitucion);
                $surname = $session->get('usuarioInstitucion');
                return $this->render('institucion/home_institucion.html.twig', [
                    'username' => $usuarioInstitucion->getNombre(), 'surname' => $surname->getNombre()
                ]);
            }
        }
        return $this->render('security/institucion_login.html.twig', [
            'registrado' => false,'error_autenticacion' => true,
        ]);
    }

    public function logoutAction(Request $request)
    {
        $session = $request->getSession();
        $session->clear();

        return $this->render('security/index.html.twig', [
            'username' => '','registrado' => false,'error_autenticacion' => false
        ]);
    }
}
