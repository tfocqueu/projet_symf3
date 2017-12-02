<?php

namespace ProjectBundle\Controller;

use Monolog\Handler\Curl\Util;
use ProjectBundle\Entity\Stage;
use ProjectBundle\Entity\Utilisateur;
use ProjectBundle\Form\EleveType;
use ProjectBundle\Form\StageEleveType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Role\Role;

class EleveController extends Controller
{

    /**
     * @Route("/eleve",name="eleve_show")
     *
     *
     */
    public function showAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ProjectBundle:Utilisateur');

        $eleve = new Utilisateur();

        $roles='ROLE_ELEVE';

        $listEleve = $repository->findByRoles($roles);

        $form = $this->createForm(EleveType::class,$eleve);

        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $nom = $eleve->getNom();
            $eleve->setRoles(array('ROLE_ELEVE'));
            $eleve->setUsername($nom);
            $em->persist($eleve);
            $em->flush();
            return $this->redirectToRoute('eleve_show');
        }

        return $this->render('@Project/ProjectFront/searchEleve.html.twig',[
            'lesEleves' => $listEleve,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @route("/show_eleve/{eleve}", name="eleve_show_id")
     *
     */
    public function showEleveAction(Request $request, Utilisateur $eleve){
        $form = $this->createForm(EleveType::class, $eleve  );
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($eleve);
            $em->flush();
            return $this->redirectToRoute('eleve_show');
        }

        $formview = $form->createView();

        $repository = $this->getDoctrine()->getManager()->getRepository('ProjectBundle:Stage');

        $listStage = $repository->findAll();

        return $this->render('@Project/ProjectFront/showeleve.html.twig', array('eleve'=> $eleve,'lesStages'=>$listStage,'form'=>$formview));
    }

    /**
     * @Route("/eleve/{eleve}", name="eleve_delete")
     */
    public function deleteAction(Utilisateur $eleve)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($eleve);
        $em->flush();

        return $this->redirectToRoute('eleve_show');
    }

    /**
     * @Route("/eleve/add/stage/{eleve}/{stage}",name="add_stage_eleve")
     */
    public function addStageEleveAction(Utilisateur $eleve, Stage $stage)
    {
        $em = $this->getDoctrine()->getManager();
            $eleve->addStage($stage);
            $em->persist($eleve);
            $em->flush();
        return $this->redirectToRoute('eleve_show');

    }
    /**
     * @Route("/eleve/delete/{eleve}/{stage}", name="stage_eleve_delete")
     */
    public function deleteStageEleveAction(Utilisateur $eleve, Stage $stage)
    {
        $em = $this->getDoctrine()->getManager();
        $eleve->removeStage($stage);
        $em->persist($eleve);
        $em->flush();

        return $this->redirectToRoute('eleve_show');
    }
}
