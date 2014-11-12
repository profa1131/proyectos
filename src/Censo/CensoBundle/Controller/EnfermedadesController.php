<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\Enfermedades;
use Censo\CensoBundle\Form\EnfermedadesType;

/**
 * Enfermedades controller.
 *
 * @Route("/enfermedades")
 */
class EnfermedadesController extends Controller
{

    /**
     * Lists all Enfermedades entities.
     *
     * @Route("/", name="enfermedades")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:Enfermedades')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Enfermedades entity.
     *
     * @Route("/", name="enfermedades_create")
     * @Method("POST")
     * @Template("CensoBundle:Enfermedades:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Enfermedades();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('enfermedades_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Enfermedades entity.
     *
     * @param Enfermedades $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Enfermedades $entity)
    {
        $form = $this->createForm(new EnfermedadesType(), $entity, array(
            'action' => $this->generateUrl('enfermedades_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Enfermedades entity.
     *
     * @Route("/new", name="enfermedades_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Enfermedades();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Enfermedades entity.
     *
     * @Route("/{id}", name="enfermedades_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Enfermedades')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enfermedades entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Enfermedades entity.
     *
     * @Route("/{id}/edit", name="enfermedades_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Enfermedades')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enfermedades entity.');
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
    * Creates a form to edit a Enfermedades entity.
    *
    * @param Enfermedades $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Enfermedades $entity)
    {
        $form = $this->createForm(new EnfermedadesType(), $entity, array(
            'action' => $this->generateUrl('enfermedades_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Enfermedades entity.
     *
     * @Route("/{id}", name="enfermedades_update")
     * @Method("PUT")
     * @Template("CensoBundle:Enfermedades:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Enfermedades')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enfermedades entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('enfermedades_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Enfermedades entity.
     *
     * @Route("/{id}", name="enfermedades_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:Enfermedades')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Enfermedades entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('enfermedades'));
    }

    /**
     * Creates a form to delete a Enfermedades entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('enfermedades_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
