<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/comics", name="comics_index")
     */
    public function comicsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $comics = $em->getRepository('AppBundle:Comic')->findAll();

        return $this->render('comic/index.html.twig', array(
          'comics' => $comics,
        ));
    }
}
