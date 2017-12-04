<?php

namespace ProjectBundle\Controller;

use ProjectBundle\Entity\Classe;
use ProjectBundle\Entity\Utilisateur;
use ProjectBundle\Form\ClasseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ClasseController extends Controller
{
    /**
     * @Route("/classe",name="classe_show", methods={"GET","HEAD"})
     *
     *
     */
    public function showAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ProjectBundle:Classe');

        $listClasse = $repository->findAll();

        $classe  = new Classe();

        $form = $this->createForm(ClasseType::class, $classe);

        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($classe);
            $em->flush();
            return $this->redirectToRoute('classe_show');
        }
        $formview = $form->createView();

        return $this->render('@Project/ProjectFront/searchclasse.html.twig',array('lesClasses'=>$listClasse,'form'=>$formview));
    }

    /**
     * @Route("/classe/add",name="classe_add", methods={"POST","HEAD"} )
     *
     */
    public function addAction(Request $request){
        $classe = new Classe();
        $form = $this->createForm(ClasseType::class,$classe);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($classe);
            $em->flush();
            return $this->redirectToRoute('classe_show');
        }
        $formview = $form->createView();
        return $this->render('@Project/ProjectFront/classeadd.html.twig',array('form'=> $formview));
    }

    /**
     * @route("/show_classe/{classe}", name="classe_show_id", methods={"GET","HEAD"})
     *
     */
    public function showClasseAction(Request $request, Classe $classe){
        $form = $this->createForm(ClasseType::class, $classe  );
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($classe);
            $em->flush();
            return $this->redirectToRoute('classe_show');
        }

        $formview = $form->createView();

        $role = "ROLE_ELEVE";

        $repository = $this->getDoctrine()->getManager()->getRepository('ProjectBundle:Utilisateur');

        $listEleve = $repository->findByRoles($role);

        return $this->render('@Project/ProjectFront/showclasse.html.twig', array('classe'=> $classe,'form'=>$formview,'lesEleves' => $listEleve));
    }

    /**
     * @Route("/classe/{classe}", name="classe_delete", methods={"GET","HEAD"})
     */
    public function deleteAction(Classe $classe)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($classe);
        $em->flush();

        return $this->redirectToRoute('classe_show');
    }

    /**
     * @Route("/classe/add/{classe}/{eleve}",name="classe_eleve_add", methods={"GET","HEAD"})
     */
    public function  addEleveClasseAction(Classe $classe, Utilisateur $eleve){
        $em = $this->getDoctrine()->getManager();
        $classe->addLesElefe($eleve);
        $em->persist($classe);
        $em->flush();
        return $this->redirectToRoute('classe_show');
    }

    /**
     * @Route("/classe/delete/{classe}/{eleve}",name="classe_eleve_delete", methods={"GET","HEAD"})
     */
    public  function  deleteEleveAction(Classe $classe, Utilisateur $eleve){
        $em = $this->getDoctrine()->getManager();
        $classe->removeLesElefe($eleve);
        $em->persist($classe);
        $em->flush();
        return $this->redirectToRoute('classe_show');
    }

}
