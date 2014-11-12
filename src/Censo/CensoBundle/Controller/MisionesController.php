<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\Misiones;
use Censo\CensoBundle\Form\MisionesType;

/**
 * Misiones controller.
 *
 * @Route("/misiones")
 */
class MisionesController extends Controller
{

    /**
     * Lists all Misiones entities.
     *
     * @Route("/", name="misiones")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:Misiones')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Misiones entity.
     *
     * @Route("/", name="misiones_create")
     * @Method("POST")
     * @Template("CensoBundle:Misiones:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Misiones();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('misiones_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Misiones entity.
     *
     * @param Misiones $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Misiones $entity)
    {
        $form = $this->createForm(new MisionesType(), $entity, array(
            'action' => $this->generateUrl('misiones_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Misiones entity.
     *
     * @Route("/new", name="misiones_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Misiones();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Misiones entity.
     *
     * @Route("/{id}", name="misiones_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Misiones')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Misiones entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Misiones entity.
     *
     * @Route("/{id}/edit", name="misiones_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Misiones')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Misiones entity.');
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
    * Creates a form to edit a Misiones entity.
    *
    * @param Misiones $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Misiones $entity)
    {
        $form = $this->createForm(new MisionesType(), $entity, array(
            'action' => $this->generateUrl('misiones_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Misiones entity.
     *
     * @Route("/{id}", name="misiones_update")
     * @Method("PUT")
     * @Template("CensoBundle:Misiones:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Misiones')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Misiones entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('misiones_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Misiones entity.
     *
     * @Route("/{id}", name="misiones_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:Misiones')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Misiones entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('misiones'));
    }

    /**
     * Creates a form to delete a Misiones entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('misiones_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
