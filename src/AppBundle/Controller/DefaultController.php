<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/run/{marca}/{modelo}", name="homepage")
     */
    public function indexAction($marca, $modelo)
    {
        #$marca = "BMW";
        #$modelo = "x3";
        return $this->render('AppBundle:default:index.html.twig', ["marca"=>$marca, "modelo"=>$modelo]);
    }
}
