<?php

namespace AppBundle\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Series;
use AppBundle\Form\SeriesType;

/**
 * Series controller.
 *
 * @Route("/admin/series")
 */
class SeriesController extends Controller
{
    /**
     * Lists all Series entities.
     *
     * @Route("/", name="admin_series_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $series = $em->getRepository('AppBundle:Series')->findAll();

        return $this->render('admin/series/index.html.twig', array(
            'series' => $series,
        ));
    }

    /**
     * Creates a new Series entity.
     *
     * @Route("/new", name="admin_series_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $series = new Series();
        $form = $this->createForm('AppBundle\Form\SeriesType', $series);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($series);
            $em->flush();

            return $this->redirectToRoute('admin_series_show', array('id' => $series->getId()));
        }

        return $this->render('admin/series/new.html.twig', array(
            'series' => $series,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Series entity.
     *
     * @Route("/{id}", name="admin_series_show")
     * @Method("GET")
     */
    public function showAction(Series $series)
    {
        $deleteForm = $this->createDeleteForm($series);

        return $this->render('admin/series/show.html.twig', array(
            'series' => $series,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Series entity.
     *
     * @Route("/{id}/edit", name="admin_series_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Series $series)
    {
        $deleteForm = $this->createDeleteForm($series);
        $editForm = $this->createForm('AppBundle\Form\SeriesType', $series);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($series);
            $em->flush();

            return $this->redirectToRoute('admin_series_edit', array('id' => $series->getId()));
        }

        return $this->render('admin/series/edit.html.twig', array(
            'series' => $series,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Series entity.
     *
     * @Route("/{id}", name="admin_series_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Series $series)
    {
        $form = $this->createDeleteForm($series);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($series);
            $em->flush();
        }

        return $this->redirectToRoute('admin_series_index');
    }

    /**
     * Creates a form to delete a Series entity.
     *
     * @param Series $series The Series entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Series $series)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_series_delete', array('id' => $series->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
