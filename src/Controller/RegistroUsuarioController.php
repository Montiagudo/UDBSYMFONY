<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RegistroUsuarioController extends AbstractController
{
    /**
     * @Route("/registro", name="registro_usuario")
     */
    public function index(Request $request): Response
    {
        $usuario = new User();
        $form = $this->createForm(UserType::class, $usuario);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $usuario->setRoles(array('ROLE_USER'));
            $em->persist($usuario);
            $em->flush();
            $this->addFlash('succes','Usuario ingresado exitosamente');
            return $this->redirectToRoute('registro_usuario');
        }

        return $this->render('registro_usuario/index.html.twig', [
            'controller_name' => 'Hola Mundo',
            'materia' => 'Lenguaje Interpretado en el Servidor',
            'miFormulario' => $form->createView()
        ]);
    }
}
