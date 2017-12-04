<?php

namespace ProjectBundle\Controller;

use ProjectBundle\Entity\Technologie;
use ProjectBundle\Form\TechnologieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TechnologieController extends Controller
{


    /**
     * @Route("/technologie",name="techno_show")
     *
     *
     */
    public function showAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ProjectBundle:Technologie');

        $listTechno = $repository->findAll();



        $techno  = new Technologie();

        $form = $this->createForm(TechnologieType::class, $techno);

        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($techno);
            $em->flush();
            return $this->redirectToRoute('techno_show');
        }

        $formview = $form->createView();

        return $this->render('@Project/ProjectFront/technologie.html.twig',array('lesTechnologies'=>$listTechno,'form'=>$formview));
    }

    /**
     * @Route("/technologie/{technologie}", name="techno_delete")
     */
    public function deleteAction(Technologie $technologie)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($technologie);
        $em->flush();
        return $this->redirectToRoute('techno_show');
    }
}
