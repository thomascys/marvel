<?php

namespace AppBundle\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Publisher;
use AppBundle\Form\PublisherType;

/**
 * Publisher controller.
 *
 * @Route("/admin/publisher")
 */
class PublisherController extends Controller
{
    /**
     * Lists all Publisher entities.
     *
     * @Route("/", name="admin_publisher_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $publishers = $em->getRepository('AppBundle:Publisher')->findAll();

        return $this->render('admin/publisher/index.html.twig', array(
            'publishers' => $publishers,
        ));
    }

    /**
     * Creates a new Publisher entity.
     *
     * @Route("/new", name="admin_publisher_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $publisher = new Publisher();
        $form = $this->createForm('AppBundle\Form\PublisherType', $publisher);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($publisher);
            $em->flush();

            return $this->redirectToRoute('admin_publisher_show', array('id' => $publisher->getId()));
        }

        return $this->render('admin/publisher/new.html.twig', array(
            'publisher' => $publisher,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Publisher entity.
     *
     * @Route("/{id}", name="admin_publisher_show")
     * @Method("GET")
     */
    public function showAction(Publisher $publisher)
    {
        $deleteForm = $this->createDeleteForm($publisher);

        return $this->render('admin/publisher/show.html.twig', array(
            'publisher' => $publisher,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Publisher entity.
     *
     * @Route("/{id}/edit", name="admin_publisher_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Publisher $publisher)
    {
        $deleteForm = $this->createDeleteForm($publisher);
        $editForm = $this->createForm('AppBundle\Form\PublisherType', $publisher);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($publisher);
            $em->flush();

            return $this->redirectToRoute('admin_publisher_edit', array('id' => $publisher->getId()));
        }

        return $this->render('admin/publisher/edit.html.twig', array(
            'publisher' => $publisher,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Publisher entity.
     *
     * @Route("/{id}", name="admin_publisher_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Publisher $publisher)
    {
        $form = $this->createDeleteForm($publisher);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($publisher);
            $em->flush();
        }

        return $this->redirectToRoute('admin_publisher_index');
    }

    /**
     * Creates a form to delete a Publisher entity.
     *
     * @param Publisher $publisher The Publisher entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Publisher $publisher)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_publisher_delete', array('id' => $publisher->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
