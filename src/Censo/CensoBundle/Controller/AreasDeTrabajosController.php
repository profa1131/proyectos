<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\AreasDeTrabajos;
use Censo\CensoBundle\Form\AreasDeTrabajosType;

/**
 * AreasDeTrabajos controller.
 *
 * @Route("/areasdetrabajos")
 */
class AreasDeTrabajosController extends Controller
{

    /**
     * Lists all AreasDeTrabajos entities.
     *
     * @Route("/", name="areasdetrabajos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:AreasDeTrabajos')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new AreasDeTrabajos entity.
     *
     * @Route("/", name="areasdetrabajos_create")
     * @Method("POST")
     * @Template("CensoBundle:AreasDeTrabajos:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new AreasDeTrabajos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('areasdetrabajos_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a AreasDeTrabajos entity.
     *
     * @param AreasDeTrabajos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(AreasDeTrabajos $entity)
    {
        $form = $this->createForm(new AreasDeTrabajosType(), $entity, array(
            'action' => $this->generateUrl('areasdetrabajos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new AreasDeTrabajos entity.
     *
     * @Route("/new", name="areasdetrabajos_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AreasDeTrabajos();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AreasDeTrabajos entity.
     *
     * @Route("/{id}", name="areasdetrabajos_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:AreasDeTrabajos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AreasDeTrabajos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AreasDeTrabajos entity.
     *
     * @Route("/{id}/edit", name="areasdetrabajos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:AreasDeTrabajos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AreasDeTrabajos entity.');
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
    * Creates a form to edit a AreasDeTrabajos entity.
    *
    * @param AreasDeTrabajos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AreasDeTrabajos $entity)
    {
        $form = $this->createForm(new AreasDeTrabajosType(), $entity, array(
            'action' => $this->generateUrl('areasdetrabajos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing AreasDeTrabajos entity.
     *
     * @Route("/{id}", name="areasdetrabajos_update")
     * @Method("PUT")
     * @Template("CensoBundle:AreasDeTrabajos:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:AreasDeTrabajos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AreasDeTrabajos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('areasdetrabajos_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AreasDeTrabajos entity.
     *
     * @Route("/{id}", name="areasdetrabajos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:AreasDeTrabajos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AreasDeTrabajos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('areasdetrabajos'));
    }

    /**
     * Creates a form to delete a AreasDeTrabajos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('areasdetrabajos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
