<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\Discapacidades;
use Censo\CensoBundle\Form\DiscapacidadesType;

/**
 * Discapacidades controller.
 *
 * @Route("/discapacidades")
 */
class DiscapacidadesController extends Controller
{

    /**
     * Lists all Discapacidades entities.
     *
     * @Route("/", name="discapacidades")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:Discapacidades')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Discapacidades entity.
     *
     * @Route("/", name="discapacidades_create")
     * @Method("POST")
     * @Template("CensoBundle:Discapacidades:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Discapacidades();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('discapacidades_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Discapacidades entity.
     *
     * @param Discapacidades $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Discapacidades $entity)
    {
        $form = $this->createForm(new DiscapacidadesType(), $entity, array(
            'action' => $this->generateUrl('discapacidades_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Discapacidades entity.
     *
     * @Route("/new", name="discapacidades_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Discapacidades();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Discapacidades entity.
     *
     * @Route("/{id}", name="discapacidades_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Discapacidades')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Discapacidades entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Discapacidades entity.
     *
     * @Route("/{id}/edit", name="discapacidades_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Discapacidades')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Discapacidades entity.');
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
    * Creates a form to edit a Discapacidades entity.
    *
    * @param Discapacidades $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Discapacidades $entity)
    {
        $form = $this->createForm(new DiscapacidadesType(), $entity, array(
            'action' => $this->generateUrl('discapacidades_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Discapacidades entity.
     *
     * @Route("/{id}", name="discapacidades_update")
     * @Method("PUT")
     * @Template("CensoBundle:Discapacidades:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Discapacidades')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Discapacidades entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('discapacidades_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Discapacidades entity.
     *
     * @Route("/{id}", name="discapacidades_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:Discapacidades')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Discapacidades entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('discapacidades'));
    }

    /**
     * Creates a form to delete a Discapacidades entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('discapacidades_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
