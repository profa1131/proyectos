<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\MecanismosInformacion;
use Censo\CensoBundle\Form\MecanismosInformacionType;

/**
 * MecanismosInformacion controller.
 *
 * @Route("/mecanismosinformacion")
 */
class MecanismosInformacionController extends Controller
{

    /**
     * Lists all MecanismosInformacion entities.
     *
     * @Route("/", name="mecanismosinformacion")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:MecanismosInformacion')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new MecanismosInformacion entity.
     *
     * @Route("/", name="mecanismosinformacion_create")
     * @Method("POST")
     * @Template("CensoBundle:MecanismosInformacion:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new MecanismosInformacion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mecanismosinformacion_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a MecanismosInformacion entity.
     *
     * @param MecanismosInformacion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(MecanismosInformacion $entity)
    {
        $form = $this->createForm(new MecanismosInformacionType(), $entity, array(
            'action' => $this->generateUrl('mecanismosinformacion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new MecanismosInformacion entity.
     *
     * @Route("/new", name="mecanismosinformacion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new MecanismosInformacion();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a MecanismosInformacion entity.
     *
     * @Route("/{id}", name="mecanismosinformacion_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:MecanismosInformacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MecanismosInformacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing MecanismosInformacion entity.
     *
     * @Route("/{id}/edit", name="mecanismosinformacion_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:MecanismosInformacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MecanismosInformacion entity.');
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
    * Creates a form to edit a MecanismosInformacion entity.
    *
    * @param MecanismosInformacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(MecanismosInformacion $entity)
    {
        $form = $this->createForm(new MecanismosInformacionType(), $entity, array(
            'action' => $this->generateUrl('mecanismosinformacion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing MecanismosInformacion entity.
     *
     * @Route("/{id}", name="mecanismosinformacion_update")
     * @Method("PUT")
     * @Template("CensoBundle:MecanismosInformacion:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:MecanismosInformacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MecanismosInformacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('mecanismosinformacion_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a MecanismosInformacion entity.
     *
     * @Route("/{id}", name="mecanismosinformacion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:MecanismosInformacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MecanismosInformacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mecanismosinformacion'));
    }

    /**
     * Creates a form to delete a MecanismosInformacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mecanismosinformacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
