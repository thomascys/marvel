<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
  /**
   * @Route("/login", name="login")
   */
  public function loginAction(Request $request) 
  {
    $authenticationUtils = $this->get('security.authentication_utils');
    
    $error = $authenticationUtils->getLastAuthenticationError();
    $lastUsername = $authenticationUtils->getLastUsername();

    return $this->render(
      'security/login.html.twig',
      array(
        // last username entered by the user
        'last_username' => $lastUsername,
        'error'         => $error,
      )
    );
  }
  /**
   * This is the route the user can use to logout.
   *
   * But, this will never be executed. Symfony will intercept this first
   * and handle the logout automatically. See logout in app/config/security.yml
   *
   * @Route("/logout", name="security_logout")
   */
  public function logoutAction()
  {
    throw new \Exception('This should never be reached!');
  }
}