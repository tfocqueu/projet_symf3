<?php

namespace ProjectBundle\Controller;

use ProjectBundle\Entity\Entreprise;
use ProjectBundle\Form\EntrepriseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EntrepriseController extends Controller
{
    /**
     * @Route("/entreprise",name="entreprise_show", methods={"GET","HEAD"})
     *
     *
     */
    public function showAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ProjectBundle:Entreprise');

        $listEntreprise = $repository->findAll();

        $entreprise  = new Entreprise();

        $form = $this->createForm(EntrepriseType::class, $entreprise);

        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($entreprise);
            $em->flush();
            return $this->redirectToRoute('entreprise_show');
        }

        $formview = $form->createView();

        return $this->render('@Project/ProjectFront/searchentreprise.html.twig',array('lesEntreprises'=>$listEntreprise,'form'=>$formview));
    }

    /**
     * @route("/show_entreprise/{entreprise}", name="entreprise_show_id", methods={"GET","HEAD"})
     *
     */
    public function showEntrepriseAction(Request $request, Entreprise $entreprise){

        $form = $this->createForm(EntrepriseType::class, $entreprise);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entreprise);
            $em->flush();
            return $this->redirectToRoute('entreprise_show');
        }

        $formview = $form->createView();

        $repositoryStage = $this->getDoctrine()->getManager()->getRepository('ProjectBundle:Stage');
        $listStage = $repositoryStage->findAll();

        return $this->render('@Project/ProjectFront/showentreprise.html.twig', array('entreprise'=> $entreprise,'stages'=>$listStage,'form'=>$formview));
    }

    /**
     * @Route("/entreprise/{entreprise}", name="entreprise_delete", methods={"GET","HEAD"})
     */
    public function deleteAction(Entreprise $entreprise)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($entreprise);
        $em->flush();

        return $this->redirectToRoute('entreprise_show');
    }

}
