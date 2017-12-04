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
     * @Route("/diplome",name="diplome_show" , methods={"GET","HEAD"})
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
     * @Route("/diplome/{diplome}", name="diplome_delete" , methods={"GET","HEAD"})
     */
    public function deleteAction(Diplome $diplome)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($diplome);
        $em->flush();

        return $this->redirectToRoute('diplome_show');
    }

}
