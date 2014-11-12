<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\ConsejosComunales;
use Censo\CensoBundle\Form\ConsejosComunalesType;

/**
 * ConsejosComunales controller.
 *
 * @Route("/consejoscomunales")
 */
class ConsejosComunalesController extends Controller
{

    /**
     * Lists all ConsejosComunales entities.
     *
     * @Route("/", name="consejoscomunales")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:ConsejosComunales')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ConsejosComunales entity.
     *
     * @Route("/", name="consejoscomunales_create")
     * @Method("POST")
     * @Template("CensoBundle:ConsejosComunales:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ConsejosComunales();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('consejoscomunales_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a ConsejosComunales entity.
     *
     * @param ConsejosComunales $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ConsejosComunales $entity)
    {
        $form = $this->createForm(new ConsejosComunalesType(), $entity, array(
            'action' => $this->generateUrl('consejoscomunales_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ConsejosComunales entity.
     *
     * @Route("/new", name="consejoscomunales_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ConsejosComunales();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ConsejosComunales entity.
     *
     * @Route("/{id}", name="consejoscomunales_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:ConsejosComunales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConsejosComunales entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ConsejosComunales entity.
     *
     * @Route("/{id}/edit", name="consejoscomunales_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:ConsejosComunales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConsejosComunales entity.');
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
    * Creates a form to edit a ConsejosComunales entity.
    *
    * @param ConsejosComunales $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ConsejosComunales $entity)
    {
        $form = $this->createForm(new ConsejosComunalesType(), $entity, array(
            'action' => $this->generateUrl('consejoscomunales_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ConsejosComunales entity.
     *
     * @Route("/{id}", name="consejoscomunales_update")
     * @Method("PUT")
     * @Template("CensoBundle:ConsejosComunales:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:ConsejosComunales')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConsejosComunales entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('consejoscomunales_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ConsejosComunales entity.
     *
     * @Route("/{id}", name="consejoscomunales_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:ConsejosComunales')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ConsejosComunales entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('consejoscomunales'));
    }

    /**
     * Creates a form to delete a ConsejosComunales entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('consejoscomunales_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
