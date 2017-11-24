<?php

namespace ProjectBundle\Controller;


use ProjectBundle\Entity\Visite;
use ProjectBundle\Form\VisiteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class VisiteController extends Controller
{
    /**
     * @Route("/visite",name="visite_show")
     *
     *
     */
    public function showAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ProjectBundle:Visite');

        $listVisite = $repository->findAll();



        $visite  = new Visite();

        $form = $this->createForm(VisiteType::class, $visite);

        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($visite);
            $em->flush();
            return $this->redirectToRoute('visite_show');
        }

        $formview = $form->createView();

        return $this->render('@Project/ProjectFront/visite.html.twig',array('lesVisits'=>$listVisite,'form'=>$formview));
    }




    /**
     * @Route("/visite/{id}", name="visite_delete")
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