<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\AguasServidas;
use Censo\CensoBundle\Form\AguasServidasType;

/**
 * AguasServidas controller.
 *
 * @Route("/aguasservidas")
 */
class AguasServidasController extends Controller
{

    /**
     * Lists all AguasServidas entities.
     *
     * @Route("/", name="aguasservidas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:AguasServidas')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new AguasServidas entity.
     *
     * @Route("/", name="aguasservidas_create")
     * @Method("POST")
     * @Template("CensoBundle:AguasServidas:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new AguasServidas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('aguasservidas_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a AguasServidas entity.
     *
     * @param AguasServidas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(AguasServidas $entity)
    {
        $form = $this->createForm(new AguasServidasType(), $entity, array(
            'action' => $this->generateUrl('aguasservidas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new AguasServidas entity.
     *
     * @Route("/new", name="aguasservidas_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AguasServidas();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AguasServidas entity.
     *
     * @Route("/{id}", name="aguasservidas_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:AguasServidas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AguasServidas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AguasServidas entity.
     *
     * @Route("/{id}/edit", name="aguasservidas_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:AguasServidas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AguasServidas entity.');
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
    * Creates a form to edit a AguasServidas entity.
    *
    * @param AguasServidas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AguasServidas $entity)
    {
        $form = $this->createForm(new AguasServidasType(), $entity, array(
            'action' => $this->generateUrl('aguasservidas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing AguasServidas entity.
     *
     * @Route("/{id}", name="aguasservidas_update")
     * @Method("PUT")
     * @Template("CensoBundle:AguasServidas:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:AguasServidas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AguasServidas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('aguasservidas_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AguasServidas entity.
     *
     * @Route("/{id}", name="aguasservidas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:AguasServidas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AguasServidas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('aguasservidas'));
    }

    /**
     * Creates a form to delete a AguasServidas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('aguasservidas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
