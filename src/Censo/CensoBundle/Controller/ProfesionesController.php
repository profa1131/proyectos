<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\Profesiones;
use Censo\CensoBundle\Form\ProfesionesType;

/**
 * Profesiones controller.
 *
 * @Route("/profesiones")
 */
class ProfesionesController extends Controller
{

    /**
     * Lists all Profesiones entities.
     *
     * @Route("/", name="profesiones")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:Profesiones')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Profesiones entity.
     *
     * @Route("/", name="profesiones_create")
     * @Method("POST")
     * @Template("CensoBundle:Profesiones:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Profesiones();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('profesiones_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Profesiones entity.
     *
     * @param Profesiones $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Profesiones $entity)
    {
        $form = $this->createForm(new ProfesionesType(), $entity, array(
            'action' => $this->generateUrl('profesiones_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Profesiones entity.
     *
     * @Route("/new", name="profesiones_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Profesiones();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Profesiones entity.
     *
     * @Route("/{id}", name="profesiones_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Profesiones')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Profesiones entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Profesiones entity.
     *
     * @Route("/{id}/edit", name="profesiones_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Profesiones')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Profesiones entity.');
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
    * Creates a form to edit a Profesiones entity.
    *
    * @param Profesiones $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Profesiones $entity)
    {
        $form = $this->createForm(new ProfesionesType(), $entity, array(
            'action' => $this->generateUrl('profesiones_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Profesiones entity.
     *
     * @Route("/{id}", name="profesiones_update")
     * @Method("PUT")
     * @Template("CensoBundle:Profesiones:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Profesiones')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Profesiones entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('profesiones_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Profesiones entity.
     *
     * @Route("/{id}", name="profesiones_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:Profesiones')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Profesiones entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('profesiones'));
    }

    /**
     * Creates a form to delete a Profesiones entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('profesiones_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
