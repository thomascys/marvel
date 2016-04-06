<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Collection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class CollectionController extends Controller
{
  /**
   * @Route("/collection", name="collection")
   */
  public function indexAction()
  {
    if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
      throw $this->createAccessDeniedException();
    }

    $em = $this->getDoctrine()->getManager();

    $collection = $em->getRepository('AppBundle:Collection')->findByUser($this->getUser()->getId());

    $comics = array();
    foreach ($collection as $comic) {
      $comics[] = $em->getRepository('AppBundle:Comic')->find($comic->getComic());
    }

    return $this->render('collection/index.html.twig',
      array('comics' => $comics));
  }

  /**
   * @Route("/collection/add", name="add_to_collection")
   * @Method("GET")
   */
  public function addToCollectionAction(Request $request)
  {
    if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
      throw $this->createAccessDeniedException();
    }

    if(!$request->isXmlHttpRequest()) {
      return new Response();
    }

    $userId = $this->getUser()->getId();
    $comicId = $request->get('comic_id');

    $em = $this->getDoctrine()->getManager();
    $comic = $em->getRepository('AppBundle:Comic')->find($comicId);
    $series = $em->getRepository('AppBundle:Series')->find($comic->getSeries());

    $collected = new Collection();
    $collected->setUser($userId);
    $collected->setComic($comic->getId());
    $collected->setSeries($comic->getSeries()->getId());
    $collected->setPublisher($series->getPublisher()->getId());

    $em->persist($collected);
    $em->flush();

    return new JsonResponse(array('message' => 'added'));
  }

  /**
   * @Route("/collection/remove", name="remove_to_collection")
   * @Method("GET")
   */
  public function removeFromCollectionAction(Request $request)
  {
    if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
      throw $this->createAccessDeniedException();
    }

    if(!$request->isXmlHttpRequest()) {
      return new Response();
    }

    $userId = $this->getUser()->getId();
    $comicId = $request->get('comic_id');

    $em = $this->getDoctrine()->getManager();
    $comic = $em->getRepository('AppBundle:Collection')->findOneBy(['comic' => $comicId, 'user' => $userId]);

    $em->remove($comic);
    $em->flush();

    return new JsonResponse(array('message' => 'removed'));
  }
}