<?php

namespace ProjectBundle\Controller;

use ProjectBundle\Entity\Utilisateur;
use ProjectBundle\Form\ReferentProType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Role\Role;

class ReferentProController extends Controller
{

    /**
     * @Route("/referentpro",name="referentpro_show")
     *
     *
     */
    public function showAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ProjectBundle:Utilisateur');

        $referentpro = new Utilisateur();

        $roles='ROLE_REFPRO';

        $listReferentPro = $repository->findByRoles($roles);

        $form = $this->createForm(ReferentProType::class,$referentpro);

        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $nom = $referentpro->getNom();
            $referentpro->setRoles(array('ROLE_REFPRO'));
            $referentpro->setUsername($nom);
            $em->persist($referentpro);
            $em->flush();
            return $this->redirectToRoute('referentpro_show');
        }

        return $this->render('@Project/ProjectFront/searchReferentPro.html.twig',[
            'lesReferentsPro' => $listReferentPro,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/referentpro/{referentpro}", name="referent_pro_delete" , methods={"GET","HEAD"})
     */
    public function deleteAction(Utilisateur $referentpro)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($referentpro);
        $em->flush();

        return $this->redirectToRoute('referentpro_show');
    }
}
