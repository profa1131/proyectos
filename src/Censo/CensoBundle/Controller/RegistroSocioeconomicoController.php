<?php

namespace Censo\CensoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Censo\CensoBundle\Entity\RegistroSocioeconomico;
use Censo\CensoBundle\Form\RegistroSocioeconomicoType;

/**
 * RegistroSocioeconomico controller.
 *
 * @Route("/registrosocioeconomico")
 */
class RegistroSocioeconomicoController extends Controller
{

    /**
     * Lists all RegistroSocioeconomico entities.
     *
     * @Route("/", name="registrosocioeconomico")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CensoBundle:RegistroSocioeconomico')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new RegistroSocioeconomico entity.
     *
     * @Route("/", name="registrosocioeconomico_create")
     * @Method("POST")
     * @Template("CensoBundle:RegistroSocioeconomico:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new RegistroSocioeconomico();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('registrosocioeconomico_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a RegistroSocioeconomico entity.
     *
     * @param RegistroSocioeconomico $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(RegistroSocioeconomico $entity)
    {
        $form = $this->createForm(new RegistroSocioeconomicoType(), $entity, array(
            'action' => $this->generateUrl('registrosocioeconomico_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Agregar','attr' => array('class' => 'btn btn-success')));

        return $form;
    }

    /**
     * Displays a form to create a new RegistroSocioeconomico entity.
     *
     * @Route("/new", name="registrosocioeconomico_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new RegistroSocioeconomico();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a RegistroSocioeconomico entity.
     *
     * @Route("/{id}", name="registrosocioeconomico_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:RegistroSocioeconomico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegistroSocioeconomico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing RegistroSocioeconomico entity.
     *
     * @Route("/{id}/edit", name="registrosocioeconomico_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:RegistroSocioeconomico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegistroSocioeconomico entity.');
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
    * Creates a form to edit a RegistroSocioeconomico entity.
    *
    * @param RegistroSocioeconomico $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(RegistroSocioeconomico $entity)
    {
        $form = $this->createForm(new RegistroSocioeconomicoType(), $entity, array(
            'action' => $this->generateUrl('registrosocioeconomico_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing RegistroSocioeconomico entity.
     *
     * @Route("/{id}", name="registrosocioeconomico_update")
     * @Method("PUT")
     * @Template("CensoBundle:RegistroSocioeconomico:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CensoBundle:RegistroSocioeconomico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegistroSocioeconomico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('registrosocioeconomico_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a RegistroSocioeconomico entity.
     *
     * @Route("/{id}", name="registrosocioeconomico_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CensoBundle:RegistroSocioeconomico')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find RegistroSocioeconomico entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('registrosocioeconomico'));
    }

    /**
     * Creates a form to delete a RegistroSocioeconomico entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('registrosocioeconomico_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
