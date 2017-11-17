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
        return $this->render('ProjectBundle:ProjectFront:accueil.html.twig');
    }
}