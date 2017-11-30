<?php

namespace ProjectBundle\Controller;

use ProjectBundle\Entity\Utilisateur;
use ProjectBundle\Form\ReferentPedaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Role\Role;

class ReferentPedaController extends Controller
{

    /**
     * @Route("/referentpeda",name="referentpeda_show")
     *
     *
     */
    public function showAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ProjectBundle:Utilisateur');

        $referentpeda = new Utilisateur();

        $roles='ROLE_REFPEDA';

        $listReferentPeda = $repository->findByRoles($roles);

        $form = $this->createForm(ReferentPedaType::class,$referentpeda);

        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $nom = $referentpeda->getNom();
            $referentpeda->setRoles(array('ROLE_REFPEDA'));
            $referentpeda->setUsername($nom);
            $em->persist($referentpeda);
            $em->flush();
            return $this->redirectToRoute('referentpeda_show');
        }

        return $this->render('@Project/ProjectFront/searchReferentPeda.html.twig',[
            'lesReferentsPeda' => $listReferentPeda,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/referentpeda/{referentpeda}", name="referent_peda_delete")
     */
    public function deleteAction(Referentpeda $referentpeda)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($referentpeda);
        $em->flush();

        return $this->redirectToRoute('referentpeda_show');
    }
}
