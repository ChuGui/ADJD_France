<?php

namespace App\Controller;

use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="security_login")
     */
    public function login(Request $request, AuthenticationUtils $authUtils)
    {
        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();
        $lastProject = $this->getDoctrine()->getManager()->getRepository('App:Project')->findLastProject();

        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        $form = $this->createForm(LoginType::class, array(
            '_username' => $lastUsername
        ));

        return $this->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
            'lastProject' => $lastProject,
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    {
        throw new \Exception('this should not be reach :)');
    }
}