<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\TipoTechos;
use Censo\CensoBundle\Form\TipoTechosType;

/**
 * TipoTechos controller.
 *
 * @Route("/tipotechos")
 */
class TipoTechosController extends Controller
{

    /**
     * Lists all TipoTechos entities.
     *
     * @Route("/", name="tipotechos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:TipoTechos')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TipoTechos entity.
     *
     * @Route("/", name="tipotechos_create")
     * @Method("POST")
     * @Template("CensoBundle:TipoTechos:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TipoTechos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipotechos_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a TipoTechos entity.
     *
     * @param TipoTechos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TipoTechos $entity)
    {
        $form = $this->createForm(new TipoTechosType(), $entity, array(
            'action' => $this->generateUrl('tipotechos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TipoTechos entity.
     *
     * @Route("/new", name="tipotechos_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TipoTechos();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TipoTechos entity.
     *
     * @Route("/{id}", name="tipotechos_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:TipoTechos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoTechos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TipoTechos entity.
     *
     * @Route("/{id}/edit", name="tipotechos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:TipoTechos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoTechos entity.');
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
    * Creates a form to edit a TipoTechos entity.
    *
    * @param TipoTechos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TipoTechos $entity)
    {
        $form = $this->createForm(new TipoTechosType(), $entity, array(
            'action' => $this->generateUrl('tipotechos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TipoTechos entity.
     *
     * @Route("/{id}", name="tipotechos_update")
     * @Method("PUT")
     * @Template("CensoBundle:TipoTechos:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:TipoTechos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoTechos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tipotechos_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TipoTechos entity.
     *
     * @Route("/{id}", name="tipotechos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:TipoTechos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoTechos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipotechos'));
    }

    /**
     * Creates a form to delete a TipoTechos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipotechos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
