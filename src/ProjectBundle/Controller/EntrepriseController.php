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
     * @Route("/entreprise",name="entreprise_show")
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
     * @route("/show_entreprise", name="entreprise_show_id")
     *
     */
    public function showEntrepriseAction(Request $request){

        $entrepriseId = $request->request->get('entreprise');
        $repository = $this->getDoctrine()->getManager()->getRepository('ProjectBundle:Entreprise');
        $entreprise = $repository->find($entrepriseId);

        return $this->render('@Project/ProjectFront/showentreprise.html.twig', array('entreprise'=> $entreprise ));
    }

    /**
     * @Route("/entreprise/{entreprise}", name="entreprise_delete")
     */
    public function deleteAction(Entreprise $entreprise)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($entreprise);
        $em->flush();

        return $this->redirectToRoute('entreprise_show');
    }

}