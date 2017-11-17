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
        return $this->render('ProjectBundle:ProjectFront:searchstage.html.twig');
    }
}