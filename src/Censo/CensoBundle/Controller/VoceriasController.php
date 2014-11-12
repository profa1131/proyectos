<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\Vocerias;
use Censo\CensoBundle\Form\VoceriasType;

/**
 * Vocerias controller.
 *
 * @Route("/vocerias")
 */
class VoceriasController extends Controller
{

    /**
     * Lists all Vocerias entities.
     *
     * @Route("/", name="vocerias")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:Vocerias')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Vocerias entity.
     *
     * @Route("/", name="vocerias_create")
     * @Method("POST")
     * @Template("CensoBundle:Vocerias:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Vocerias();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('vocerias_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Vocerias entity.
     *
     * @param Vocerias $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Vocerias $entity)
    {
        $form = $this->createForm(new VoceriasType(), $entity, array(
            'action' => $this->generateUrl('vocerias_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Vocerias entity.
     *
     * @Route("/new", name="vocerias_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Vocerias();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Vocerias entity.
     *
     * @Route("/{id}", name="vocerias_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Vocerias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vocerias entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Vocerias entity.
     *
     * @Route("/{id}/edit", name="vocerias_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Vocerias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vocerias entity.');
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
    * Creates a form to edit a Vocerias entity.
    *
    * @param Vocerias $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Vocerias $entity)
    {
        $form = $this->createForm(new VoceriasType(), $entity, array(
            'action' => $this->generateUrl('vocerias_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Vocerias entity.
     *
     * @Route("/{id}", name="vocerias_update")
     * @Method("PUT")
     * @Template("CensoBundle:Vocerias:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Vocerias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vocerias entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('vocerias_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Vocerias entity.
     *
     * @Route("/{id}", name="vocerias_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:Vocerias')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Vocerias entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('vocerias'));
    }

    /**
     * Creates a form to delete a Vocerias entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vocerias_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
