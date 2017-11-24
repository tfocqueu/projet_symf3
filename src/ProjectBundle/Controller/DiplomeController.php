<?php

namespace ProjectBundle\Controller;

use ProjectBundle\Entity\Diplome;
use ProjectBundle\Form\DiplomeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DiplomeController extends Controller
{


    /**
     * @Route("/diplome",name="diplome_show")
     *
     *
     */
    public function showAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ProjectBundle:Diplome');

        $listDiplome = $repository->findAll();



        $diplome  = new Diplome();

        $form = $this->createForm(DiplomeType::class, $diplome);

        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($diplome);
            $em->flush();
            return $this->redirectToRoute('diplome_show');
        }

        $formview = $form->createView();

        return $this->render('@Project/ProjectFront/diplome.html.twig',array('lesDiplomes'=>$listDiplome,'form'=>$formview));
    }




    /**
     * @Route("/diplome/{id}", name="diplome_delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $diplomerepository = $this->getDoctrine()->getManager()->getRepository('ProjectBundle:Diplome');
        $leDiplome = $diplomerepository->find($id);

        $em->remove($leDiplome);
        $em->flush();

        return $this->redirectToRoute('diplome_show');
    }

}