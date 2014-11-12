<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\Telefonias;
use Censo\CensoBundle\Form\TelefoniasType;

/**
 * Telefonias controller.
 *
 * @Route("/telefonias")
 */
class TelefoniasController extends Controller
{

    /**
     * Lists all Telefonias entities.
     *
     * @Route("/", name="telefonias")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:Telefonias')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Telefonias entity.
     *
     * @Route("/", name="telefonias_create")
     * @Method("POST")
     * @Template("CensoBundle:Telefonias:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Telefonias();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('telefonias_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Telefonias entity.
     *
     * @param Telefonias $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Telefonias $entity)
    {
        $form = $this->createForm(new TelefoniasType(), $entity, array(
            'action' => $this->generateUrl('telefonias_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Telefonias entity.
     *
     * @Route("/new", name="telefonias_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Telefonias();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Telefonias entity.
     *
     * @Route("/{id}", name="telefonias_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Telefonias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Telefonias entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Telefonias entity.
     *
     * @Route("/{id}/edit", name="telefonias_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Telefonias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Telefonias entity.');
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
    * Creates a form to edit a Telefonias entity.
    *
    * @param Telefonias $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Telefonias $entity)
    {
        $form = $this->createForm(new TelefoniasType(), $entity, array(
            'action' => $this->generateUrl('telefonias_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Telefonias entity.
     *
     * @Route("/{id}", name="telefonias_update")
     * @Method("PUT")
     * @Template("CensoBundle:Telefonias:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:Telefonias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Telefonias entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('telefonias_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Telefonias entity.
     *
     * @Route("/{id}", name="telefonias_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:Telefonias')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Telefonias entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('telefonias'));
    }

    /**
     * Creates a form to delete a Telefonias entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('telefonias_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
