<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\TipoParedes;
use Censo\CensoBundle\Form\TipoParedesType;

/**
 * TipoParedes controller.
 *
 * @Route("/tipoparedes")
 */
class TipoParedesController extends Controller
{

    /**
     * Lists all TipoParedes entities.
     *
     * @Route("/", name="tipoparedes")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:TipoParedes')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TipoParedes entity.
     *
     * @Route("/", name="tipoparedes_create")
     * @Method("POST")
     * @Template("CensoBundle:TipoParedes:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TipoParedes();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipoparedes_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a TipoParedes entity.
     *
     * @param TipoParedes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TipoParedes $entity)
    {
        $form = $this->createForm(new TipoParedesType(), $entity, array(
            'action' => $this->generateUrl('tipoparedes_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TipoParedes entity.
     *
     * @Route("/new", name="tipoparedes_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TipoParedes();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TipoParedes entity.
     *
     * @Route("/{id}", name="tipoparedes_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:TipoParedes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoParedes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TipoParedes entity.
     *
     * @Route("/{id}/edit", name="tipoparedes_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:TipoParedes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoParedes entity.');
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
    * Creates a form to edit a TipoParedes entity.
    *
    * @param TipoParedes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TipoParedes $entity)
    {
        $form = $this->createForm(new TipoParedesType(), $entity, array(
            'action' => $this->generateUrl('tipoparedes_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TipoParedes entity.
     *
     * @Route("/{id}", name="tipoparedes_update")
     * @Method("PUT")
     * @Template("CensoBundle:TipoParedes:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:TipoParedes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoParedes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tipoparedes_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TipoParedes entity.
     *
     * @Route("/{id}", name="tipoparedes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:TipoParedes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoParedes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipoparedes'));
    }

    /**
     * Creates a form to delete a TipoParedes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipoparedes_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
