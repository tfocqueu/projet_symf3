<?php

namespace ProjectBundle\Controller;

use ProjectBundle\Entity\EntrepriseType;
use ProjectBundle\Form\Type\EntrepriseTypeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EntrepriseTypeController extends Controller
{
    /**
     * @Route("/entreprisetype",name="entreprisetype_show")
     *
     *
     */
    public function showAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ProjectBundle:EntrepriseType');

        $listEntrepriseType = $repository->findAll();

        $entrepriseType  = new EntrepriseType();

        $form = $this->createForm(EntrepriseTypeType::class, $entrepriseType);

        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($entrepriseType);
            $em->flush();
            return $this->redirectToRoute('entreprisetype_show');
        }

        $formview = $form->createView();

        return $this->render('@Project/ProjectFront/searchentreprisetype.html.twig',array('lesTypesEntreprises'=>$listEntrepriseType,'form'=>$formview));
    }

    /**
     * @Route("/entreprisetype/{entreprisetype}", name="entreprisetype_delete")
     */
    public function deleteAction(EntrepriseType $entrepriseType)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($entrepriseType);
        $em->flush();

        return $this->redirectToRoute('entreprisetype_show');
    }

}
