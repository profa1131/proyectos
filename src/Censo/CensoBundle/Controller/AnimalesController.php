<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\Animales;
use Censo\CensoBundle\Form\AnimalesType;

/**
 * Animales controller.
 *
 * @Route("/animales")
 */
class AnimalesController extends Controller
{

    /**
     * Lists all Animales entities.
     *
     * @Route("/", name="animales")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:Animales')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Animales entity.
     *
     * @Route("/", name="animales_create")
     * @Method("POST")
     * @Template("CensoBundle:Animales:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Animales();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('animales_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Animales entity.
     *
     * @param Animales $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Animales $entity)
    {
        $form = $this->createForm(new AnimalesType(), $entity, array(
            'action' => $this->generateUrl('animales_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Animales entity.
     *
     * @Route("/new", name="animales_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Animales();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Animales entity.
     *
     * @Route("/{id}", name="animales_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Animales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Animales entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Animales entity.
     *
     * @Route("/{id}/edit", name="animales_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Animales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Animales entity.');
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
    * Creates a form to edit a Animales entity.
    *
    * @param Animales $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Animales $entity)
    {
        $form = $this->createForm(new AnimalesType(), $entity, array(
            'action' => $this->generateUrl('animales_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Animales entity.
     *
     * @Route("/{id}", name="animales_update")
     * @Method("PUT")
     * @Template("CensoBundle:Animales:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Animales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Animales entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('animales_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Animales entity.
     *
     * @Route("/{id}", name="animales_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:Animales')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Animales entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('animales'));
    }

    /**
     * Creates a form to delete a Animales entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('animales_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
