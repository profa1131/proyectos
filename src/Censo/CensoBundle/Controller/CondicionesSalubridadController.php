<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\CondicionesSalubridad;
use Censo\CensoBundle\Form\CondicionesSalubridadType;

/**
 * CondicionesSalubridad controller.
 *
 * @Route("/condicionessalubridad")
 */
class CondicionesSalubridadController extends Controller
{

    /**
     * Lists all CondicionesSalubridad entities.
     *
     * @Route("/", name="condicionessalubridad")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:CondicionesSalubridad')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new CondicionesSalubridad entity.
     *
     * @Route("/", name="condicionessalubridad_create")
     * @Method("POST")
     * @Template("CensoBundle:CondicionesSalubridad:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new CondicionesSalubridad();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('condicionessalubridad_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a CondicionesSalubridad entity.
     *
     * @param CondicionesSalubridad $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CondicionesSalubridad $entity)
    {
        $form = $this->createForm(new CondicionesSalubridadType(), $entity, array(
            'action' => $this->generateUrl('condicionessalubridad_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CondicionesSalubridad entity.
     *
     * @Route("/new", name="condicionessalubridad_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CondicionesSalubridad();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a CondicionesSalubridad entity.
     *
     * @Route("/{id}", name="condicionessalubridad_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:CondicionesSalubridad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CondicionesSalubridad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CondicionesSalubridad entity.
     *
     * @Route("/{id}/edit", name="condicionessalubridad_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:CondicionesSalubridad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CondicionesSalubridad entity.');
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
    * Creates a form to edit a CondicionesSalubridad entity.
    *
    * @param CondicionesSalubridad $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CondicionesSalubridad $entity)
    {
        $form = $this->createForm(new CondicionesSalubridadType(), $entity, array(
            'action' => $this->generateUrl('condicionessalubridad_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CondicionesSalubridad entity.
     *
     * @Route("/{id}", name="condicionessalubridad_update")
     * @Method("PUT")
     * @Template("CensoBundle:CondicionesSalubridad:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:CondicionesSalubridad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CondicionesSalubridad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('condicionessalubridad_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a CondicionesSalubridad entity.
     *
     * @Route("/{id}", name="condicionessalubridad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:CondicionesSalubridad')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CondicionesSalubridad entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('condicionessalubridad'));
    }

    /**
     * Creates a form to delete a CondicionesSalubridad entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('condicionessalubridad_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
