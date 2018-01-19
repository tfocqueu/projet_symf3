<?php

namespace ProjectBundle\Controller;
use ProjectBundle\ProjectBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class IndexController extends Controller
{
    /**
     * @Route("/", name="accueil")
     *
     *
     */
    public function indexAction(){

        return $this->render('@Project/ProjectFront/accueil.html.twig');
    }

}
