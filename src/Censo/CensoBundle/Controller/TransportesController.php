<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\Transportes;
use Censo\CensoBundle\Form\TransportesType;

/**
 * Transportes controller.
 *
 * @Route("/transportes")
 */
class TransportesController extends Controller
{

    /**
     * Lists all Transportes entities.
     *
     * @Route("/", name="transportes")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:Transportes')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Transportes entity.
     *
     * @Route("/", name="transportes_create")
     * @Method("POST")
     * @Template("CensoBundle:Transportes:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Transportes();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('transportes_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Transportes entity.
     *
     * @param Transportes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Transportes $entity)
    {
        $form = $this->createForm(new TransportesType(), $entity, array(
            'action' => $this->generateUrl('transportes_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Transportes entity.
     *
     * @Route("/new", name="transportes_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Transportes();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Transportes entity.
     *
     * @Route("/{id}", name="transportes_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Transportes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Transportes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Transportes entity.
     *
     * @Route("/{id}/edit", name="transportes_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Transportes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Transportes entity.');
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
    * Creates a form to edit a Transportes entity.
    *
    * @param Transportes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Transportes $entity)
    {
        $form = $this->createForm(new TransportesType(), $entity, array(
            'action' => $this->generateUrl('transportes_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Transportes entity.
     *
     * @Route("/{id}", name="transportes_update")
     * @Method("PUT")
     * @Template("CensoBundle:Transportes:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Transportes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Transportes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('transportes_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Transportes entity.
     *
     * @Route("/{id}", name="transportes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:Transportes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Transportes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('transportes'));
    }

    /**
     * Creates a form to delete a Transportes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('transportes_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
