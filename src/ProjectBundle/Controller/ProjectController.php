<?php

namespace ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class ProjectController extends Controller
{
    /**
     * @Route("/")
     */

    public function indexAction()
    {
        $userManager = $this->container->get('fos_user.user_manager');

        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        return $this->render('ProjectBundle:ProjectFront:accueil.html.twig', array('user' => $user));
    }

    /**
     * @Route("/stage",name="searchstage")
     */
    public function searchStageAction()
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        return $this->render('ProjectBundle:ProjectFront:searchstage.html.twig', array('user' => $user));
    }
    /**
     * @Route("/entreprise",name="searchentreprise")
     */
    public function searchEntrepriseAction()
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        return $this->render('ProjectBundle:ProjectFront:searchentreprise.html.twig', array('user' => $user));
    }
    /**
     * @Route("/suivi",name="searchsuivi")
     */
    public function searchSuiviAction()
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        return $this->render('ProjectBundle:ProjectFront:searchsuivi.html.twig', array('user' => $user));
    }
}