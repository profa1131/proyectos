<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\RecoleccionBasura;
use Censo\CensoBundle\Form\RecoleccionBasuraType;

/**
 * RecoleccionBasura controller.
 *
 * @Route("/recoleccionbasura")
 */
class RecoleccionBasuraController extends Controller
{

    /**
     * Lists all RecoleccionBasura entities.
     *
     * @Route("/", name="recoleccionbasura")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:RecoleccionBasura')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new RecoleccionBasura entity.
     *
     * @Route("/", name="recoleccionbasura_create")
     * @Method("POST")
     * @Template("CensoBundle:RecoleccionBasura:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new RecoleccionBasura();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('recoleccionbasura_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a RecoleccionBasura entity.
     *
     * @param RecoleccionBasura $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(RecoleccionBasura $entity)
    {
        $form = $this->createForm(new RecoleccionBasuraType(), $entity, array(
            'action' => $this->generateUrl('recoleccionbasura_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new RecoleccionBasura entity.
     *
     * @Route("/new", name="recoleccionbasura_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new RecoleccionBasura();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a RecoleccionBasura entity.
     *
     * @Route("/{id}", name="recoleccionbasura_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:RecoleccionBasura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RecoleccionBasura entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing RecoleccionBasura entity.
     *
     * @Route("/{id}/edit", name="recoleccionbasura_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:RecoleccionBasura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RecoleccionBasura entity.');
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
    * Creates a form to edit a RecoleccionBasura entity.
    *
    * @param RecoleccionBasura $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(RecoleccionBasura $entity)
    {
        $form = $this->createForm(new RecoleccionBasuraType(), $entity, array(
            'action' => $this->generateUrl('recoleccionbasura_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing RecoleccionBasura entity.
     *
     * @Route("/{id}", name="recoleccionbasura_update")
     * @Method("PUT")
     * @Template("CensoBundle:RecoleccionBasura:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:RecoleccionBasura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RecoleccionBasura entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('recoleccionbasura_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a RecoleccionBasura entity.
     *
     * @Route("/{id}", name="recoleccionbasura_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:RecoleccionBasura')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find RecoleccionBasura entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('recoleccionbasura'));
    }

    /**
     * Creates a form to delete a RecoleccionBasura entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('recoleccionbasura_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
