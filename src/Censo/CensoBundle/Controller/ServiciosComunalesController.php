<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\ServiciosComunales;
use Censo\CensoBundle\Form\ServiciosComunalesType;

/**
 * ServiciosComunales controller.
 *
 * @Route("/servicioscomunales")
 */
class ServiciosComunalesController extends Controller
{

    /**
     * Lists all ServiciosComunales entities.
     *
     * @Route("/", name="servicioscomunales")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:ServiciosComunales')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ServiciosComunales entity.
     *
     * @Route("/", name="servicioscomunales_create")
     * @Method("POST")
     * @Template("CensoBundle:ServiciosComunales:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ServiciosComunales();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('servicioscomunales_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a ServiciosComunales entity.
     *
     * @param ServiciosComunales $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ServiciosComunales $entity)
    {
        $form = $this->createForm(new ServiciosComunalesType(), $entity, array(
            'action' => $this->generateUrl('servicioscomunales_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ServiciosComunales entity.
     *
     * @Route("/new", name="servicioscomunales_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ServiciosComunales();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ServiciosComunales entity.
     *
     * @Route("/{id}", name="servicioscomunales_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:ServiciosComunales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ServiciosComunales entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ServiciosComunales entity.
     *
     * @Route("/{id}/edit", name="servicioscomunales_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:ServiciosComunales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ServiciosComunales entity.');
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
    * Creates a form to edit a ServiciosComunales entity.
    *
    * @param ServiciosComunales $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ServiciosComunales $entity)
    {
        $form = $this->createForm(new ServiciosComunalesType(), $entity, array(
            'action' => $this->generateUrl('servicioscomunales_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ServiciosComunales entity.
     *
     * @Route("/{id}", name="servicioscomunales_update")
     * @Method("PUT")
     * @Template("CensoBundle:ServiciosComunales:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:ServiciosComunales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ServiciosComunales entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('servicioscomunales_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ServiciosComunales entity.
     *
     * @Route("/{id}", name="servicioscomunales_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:ServiciosComunales')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ServiciosComunales entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('servicioscomunales'));
    }

    /**
     * Creates a form to delete a ServiciosComunales entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('servicioscomunales_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
