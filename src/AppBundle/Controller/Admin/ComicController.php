<?php

namespace AppBundle\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Comic;
use AppBundle\Form\ComicType;

/**
 * Comic controller.
 *
 * @Route("/admin/comic")
 */
class ComicController extends Controller
{
    /**
     * Lists all Comic entities.
     *
     * @Route("/", name="admin_comic_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $em = $this->getDoctrine()->getManager();

        $comics = $em->getRepository('AppBundle:Comic')->findAll();

        return $this->render('admin/comic/index.html.twig', array(
            'comics' => $comics,
        ));
    }

    /**
     * Creates a new Comic entity.
     *
     * @Route("/new", name="admin_comic_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $comic = new Comic();
        $form = $this->createForm('AppBundle\Form\ComicType', $comic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comic);
            $em->flush();

            return $this->redirectToRoute('admin_comic_show', array('id' => $comic->getId()));
        }

        return $this->render('admin/comic/new.html.twig', array(
            'comic' => $comic,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Comic entity.
     *
     * @Route("/{id}", name="admin_comic_show")
     * @Method("GET")
     */
    public function showAction(Comic $comic)
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $deleteForm = $this->createDeleteForm($comic);

        return $this->render('admin/comic/show.html.twig', array(
            'comic' => $comic,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Comic entity.
     *
     * @Route("/{id}/edit", name="admin_comic_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Comic $comic)
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $deleteForm = $this->createDeleteForm($comic);
        $editForm = $this->createForm('AppBundle\Form\ComicType', $comic);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comic);
            $em->flush();

            return $this->redirectToRoute('admin_comic_edit', array('id' => $comic->getId()));
        }

        return $this->render('admin/comic/edit.html.twig', array(
            'comic' => $comic,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Comic entity.
     *
     * @Route("/{id}", name="admin_comic_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Comic $comic)
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }
        
        $form = $this->createDeleteForm($comic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comic);
            $em->flush();
        }

        return $this->redirectToRoute('admin_comic_index');
    }

    /**
     * Creates a form to delete a Comic entity.
     *
     * @param Comic $comic The Comic entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Comic $comic)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_comic_delete', array('id' => $comic->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
