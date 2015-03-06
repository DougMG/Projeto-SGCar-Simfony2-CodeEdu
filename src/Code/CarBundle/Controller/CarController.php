<?php


namespace Code\CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CarController extends Controller
{
    /**
     * @Route("/", name="index_cars")
     * @Template("CodeCarBundle:Car:index.html.twig")
     */
    public function indexAction()
    {
        $automoveis = array('Fiat' => ["Palio", "Strada", "Linea", "Punto" ],
                                    'Wolksvagen' => ["Gol", "Fox", "Saveiro", "Amarock"],
                                    'Honda' => ["Civic", "New Civic"],
                                    'Chevrolet' => ["Camaro", "S10", "Onix", "Cruzer"]);

        $resultado = array();

        foreach ($automoveis as  $key=>$automovel) {
                //$result[$key][] = $automovel;
            foreach ($automovel as $value) {
                $resultado[$key][] = $value;
            }
        }

        return $this->render('CodeCarBundle:Car:index.html.twig', ["resultados"=>$resultado]);
    }
}
