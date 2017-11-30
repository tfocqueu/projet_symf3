<?php

namespace ProjectBundle\Controller;

<<<<<<< HEAD

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ProjectBundle\Entity\Stage;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ProjectBundle\Form\StageType;
=======
use ProjectBundle\Entity\Stage;
use ProjectBundle\Form\StageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
>>>>>>> feature/showentreprise

class StageController extends Controller
{
    /**
     * @Route("/stage",name="stage_show")
<<<<<<< HEAD
     */
    public function showAction(){
        $repository  = $this->getDoctrine()->getManager()->getRepository('ProjectBundle:Stage');
        $listStage = $repository->findAll();

        return $this->render('@Project/ProjectFront/searchstage.html.twig',array('lesStage'=>$listStage));
=======
     *
     *
     */
    public function showAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ProjectBundle:Stage');

        $listStage = $repository->findAll();

        $stage  = new Stage();

        $form = $this->createForm(StageType::class, $stage);

        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($stage);
            $em->flush();
            return $this->redirectToRoute('stage_show');
        }
        $formview = $form->createView();

        return $this->render('@Project/ProjectFront/searchstage.html.twig',array('lesStages'=>$listStage,'form'=>$formview));
>>>>>>> feature/showentreprise
    }

    /**
     * @Route("/stage/add",name="stage_add" )
     *
     */
    public function addAction(Request $request){
        $stage = new Stage();
<<<<<<< HEAD

        $form = $this->createForm(StageType::class,$stage);

        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();

=======
        $form = $this->createForm(StageType::class,$stage);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
>>>>>>> feature/showentreprise
            $em->persist($stage);
            $em->flush();
            return $this->redirectToRoute('stage_show');
        }
<<<<<<< HEAD

        $formview = $form->createView();

        return $this->render('@Project/ProjectFront/stageadd.html.twig',array('form'=> $formview));

    }


    /**
     * @Route("/stage/{Stage}",name="stage_show_id")
     */
    public function showStageAction(Stage $stage){

        return $this->render('@Project/ProjectFront/showstage.html.twig',array('leStage'=>$stage));
    }

    /**
     * @Route("/stage/delete/{Stage}",name="stage_delete")
     */
    public function deleteAction(Stage $stage){
        $em = $this->getDoctrine()->getManager();

=======
        $formview = $form->createView();
        return $this->render('@Project/ProjectFront/stageadd.html.twig',array('form'=> $formview));
    }

    /**
     * @route("/show_stage/{stage}", name="stage_show_id")
     *
     */
    public function showStageAction(Request $request, Stage $stage){
        $form = $this->createForm(StageType::class, $stage  );
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stage);
            $em->flush();
            return $this->redirectToRoute('stage_show');
        }

        $formview = $form->createView();

        return $this->render('@Project/ProjectFront/showstage.html.twig', array('stage'=> $stage,'form'=>$formview));
    }

    /**
     * @Route("/stage/{stage}", name="stage_delete")
     */
    public function deleteAction(Stage $stage)
    {
        $em = $this->getDoctrine()->getManager();
>>>>>>> feature/showentreprise
        $em->remove($stage);
        $em->flush();

        return $this->redirectToRoute('stage_show');
<<<<<<< HEAD

=======
>>>>>>> feature/showentreprise
    }

}