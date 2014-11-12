<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\Enseres;
use Censo\CensoBundle\Form\EnseresType;

/**
 * Enseres controller.
 *
 * @Route("/enseres")
 */
class EnseresController extends Controller
{

    /**
     * Lists all Enseres entities.
     *
     * @Route("/", name="enseres")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:Enseres')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Enseres entity.
     *
     * @Route("/", name="enseres_create")
     * @Method("POST")
     * @Template("CensoBundle:Enseres:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Enseres();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('enseres_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Enseres entity.
     *
     * @param Enseres $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Enseres $entity)
    {
        $form = $this->createForm(new EnseresType(), $entity, array(
            'action' => $this->generateUrl('enseres_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Enseres entity.
     *
     * @Route("/new", name="enseres_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Enseres();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Enseres entity.
     *
     * @Route("/{id}", name="enseres_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Enseres')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enseres entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Enseres entity.
     *
     * @Route("/{id}/edit", name="enseres_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Enseres')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enseres entity.');
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
    * Creates a form to edit a Enseres entity.
    *
    * @param Enseres $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Enseres $entity)
    {
        $form = $this->createForm(new EnseresType(), $entity, array(
            'action' => $this->generateUrl('enseres_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Enseres entity.
     *
     * @Route("/{id}", name="enseres_update")
     * @Method("PUT")
     * @Template("CensoBundle:Enseres:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Enseres')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enseres entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('enseres_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Enseres entity.
     *
     * @Route("/{id}", name="enseres_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:Enseres')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Enseres entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('enseres'));
    }

    /**
     * Creates a form to delete a Enseres entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('enseres_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
