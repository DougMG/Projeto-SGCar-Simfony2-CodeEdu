<?php

namespace Code\CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/run/{marca}/{modelo}", name="pag-fase01")
     * @Template("CodeCarsBundle:Default:index.html.twig")
     */
    public function indexAction($marca, $modelo)
    {
        //$modelo = "X3";
        //$marca = "BMW";
        return $this->render('CodeCarBundle:Default:index.html.twig', ['marca' => $marca, 'modelo'=>$modelo]);
    }
}
