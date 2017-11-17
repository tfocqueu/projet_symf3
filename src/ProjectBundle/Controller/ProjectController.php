<?php

namespace ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class ProjectController extends Controller
{
    /**
     * @Route("/accueil")
     */

    public function indexAction()
    {
        return $this->render('ProjectBundle:ProjectFront:accueil.html.twig');
    }

    /**
     * @Route("/stage",name="searchstage")
     */
    public function searchStageAction()
    {
        return $this->render('ProjectBundle:ProjectFront:searchstage.html.twig');
    }
}