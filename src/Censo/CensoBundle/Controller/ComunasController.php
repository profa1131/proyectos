<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\Comunas;
use Censo\CensoBundle\Form\ComunasType;

/**
 * Comunas controller.
 *
 * @Route("/comunas")
 */
class ComunasController extends Controller
{

    /**
     * Lists all Comunas entities.
     *
     * @Route("/", name="comunas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:Comunas')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Comunas entity.
     *
     * @Route("/", name="comunas_create")
     * @Method("POST")
     * @Template("CensoBundle:Comunas:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Comunas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('comunas_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Comunas entity.
     *
     * @param Comunas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Comunas $entity)
    {
        $form = $this->createForm(new ComunasType(), $entity, array(
            'action' => $this->generateUrl('comunas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Comunas entity.
     *
     * @Route("/new", name="comunas_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Comunas();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Comunas entity.
     *
     * @Route("/{id}", name="comunas_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Comunas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comunas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Comunas entity.
     *
     * @Route("/{id}/edit", name="comunas_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Comunas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comunas entity.');
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
    * Creates a form to edit a Comunas entity.
    *
    * @param Comunas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Comunas $entity)
    {
        $form = $this->createForm(new ComunasType(), $entity, array(
            'action' => $this->generateUrl('comunas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Comunas entity.
     *
     * @Route("/{id}", name="comunas_update")
     * @Method("PUT")
     * @Template("CensoBundle:Comunas:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Comunas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comunas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('comunas_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Comunas entity.
     *
     * @Route("/{id}", name="comunas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:Comunas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Comunas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('comunas'));
    }

    /**
     * Creates a form to delete a Comunas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comunas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
