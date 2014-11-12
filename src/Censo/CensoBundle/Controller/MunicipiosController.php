<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\Municipios;
use Censo\CensoBundle\Form\MunicipiosType;

/**
 * Municipios controller.
 *
 * @Route("/municipios")
 */
class MunicipiosController extends Controller
{

    /**
     * Lists all Municipios entities.
     *
     * @Route("/", name="municipios")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:Municipios')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Municipios entity.
     *
     * @Route("/", name="municipios_create")
     * @Method("POST")
     * @Template("CensoBundle:Municipios:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Municipios();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('municipios_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Municipios entity.
     *
     * @param Municipios $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Municipios $entity)
    {
        $form = $this->createForm(new MunicipiosType(), $entity, array(
            'action' => $this->generateUrl('municipios_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Municipios entity.
     *
     * @Route("/new", name="municipios_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Municipios();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Municipios entity.
     *
     * @Route("/{id}", name="municipios_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Municipios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Municipios entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Municipios entity.
     *
     * @Route("/{id}/edit", name="municipios_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Municipios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Municipios entity.');
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
    * Creates a form to edit a Municipios entity.
    *
    * @param Municipios $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Municipios $entity)
    {
        $form = $this->createForm(new MunicipiosType(), $entity, array(
            'action' => $this->generateUrl('municipios_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Municipios entity.
     *
     * @Route("/{id}", name="municipios_update")
     * @Method("PUT")
     * @Template("CensoBundle:Municipios:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Municipios')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Municipios entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('municipios_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Municipios entity.
     *
     * @Route("/{id}", name="municipios_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:Municipios')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Municipios entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('municipios'));
    }

    /**
     * Creates a form to delete a Municipios entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('municipios_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
