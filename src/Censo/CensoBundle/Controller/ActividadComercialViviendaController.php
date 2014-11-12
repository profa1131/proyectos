<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\ActividadComercialVivienda;
use Censo\CensoBundle\Form\ActividadComercialViviendaType;

/**
 * ActividadComercialVivienda controller.
 *
 * @Route("/actividadcomercialvivienda")
 */
class ActividadComercialViviendaController extends Controller
{

    /**
     * Lists all ActividadComercialVivienda entities.
     *
     * @Route("/", name="actividadcomercialvivienda")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:ActividadComercialVivienda')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ActividadComercialVivienda entity.
     *
     * @Route("/", name="actividadcomercialvivienda_create")
     * @Method("POST")
     * @Template("CensoBundle:ActividadComercialVivienda:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ActividadComercialVivienda();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('actividadcomercialvivienda_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a ActividadComercialVivienda entity.
     *
     * @param ActividadComercialVivienda $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ActividadComercialVivienda $entity)
    {
        $form = $this->createForm(new ActividadComercialViviendaType(), $entity, array(
            'action' => $this->generateUrl('actividadcomercialvivienda_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ActividadComercialVivienda entity.
     *
     * @Route("/new", name="actividadcomercialvivienda_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ActividadComercialVivienda();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ActividadComercialVivienda entity.
     *
     * @Route("/{id}", name="actividadcomercialvivienda_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:ActividadComercialVivienda')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ActividadComercialVivienda entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ActividadComercialVivienda entity.
     *
     * @Route("/{id}/edit", name="actividadcomercialvivienda_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:ActividadComercialVivienda')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ActividadComercialVivienda entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a ActividadComercialVivienda entity.
    *
    * @param ActividadComercialVivienda $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ActividadComercialVivienda $entity)
    {
        $form = $this->createForm(new ActividadComercialViviendaType(), $entity, array(
            'action' => $this->generateUrl('actividadcomercialvivienda_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ActividadComercialVivienda entity.
     *
     * @Route("/{id}", name="actividadcomercialvivienda_update")
     * @Method("PUT")
     * @Template("CensoBundle:ActividadComercialVivienda:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:ActividadComercialVivienda')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ActividadComercialVivienda entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('actividadcomercialvivienda_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ActividadComercialVivienda entity.
     *
     * @Route("/{id}", name="actividadcomercialvivienda_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:ActividadComercialVivienda')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ActividadComercialVivienda entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('actividadcomercialvivienda'));
    }

    /**
     * Creates a form to delete a ActividadComercialVivienda entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('actividadcomercialvivienda_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
