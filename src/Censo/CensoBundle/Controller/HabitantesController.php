<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\Habitantes;
use Censo\CensoBundle\Form\HabitantesType;

/**
 * Habitantes controller.
 *
 * @Route("/habitantes")
 */
class HabitantesController extends Controller
{

    /**
     * Lists all Habitantes entities.
     *
     * @Route("/", name="habitantes")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:Habitantes')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Habitantes entity.
     *
     * @Route("/", name="habitantes_create")
     * @Method("POST")
     * @Template("CensoBundle:Habitantes:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Habitantes();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('habitantes_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Habitantes entity.
     *
     * @param Habitantes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Habitantes $entity)
    {
        $form = $this->createForm(new HabitantesType(), $entity, array(
            'action' => $this->generateUrl('habitantes_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Habitantes entity.
     *
     * @Route("/new", name="habitantes_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Habitantes();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Habitantes entity.
     *
     * @Route("/{id}", name="habitantes_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Habitantes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Habitantes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Habitantes entity.
     *
     * @Route("/{id}/edit", name="habitantes_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Habitantes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Habitantes entity.');
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
    * Creates a form to edit a Habitantes entity.
    *
    * @param Habitantes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Habitantes $entity)
    {
        $form = $this->createForm(new HabitantesType(), $entity, array(
            'action' => $this->generateUrl('habitantes_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Habitantes entity.
     *
     * @Route("/{id}", name="habitantes_update")
     * @Method("PUT")
     * @Template("CensoBundle:Habitantes:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Habitantes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Habitantes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('habitantes_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Habitantes entity.
     *
     * @Route("/{id}", name="habitantes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:Habitantes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Habitantes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('habitantes'));
    }

    /**
     * Creates a form to delete a Habitantes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('habitantes_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
