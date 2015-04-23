<?php


namespace Code\CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Code\CarBundle\Entity\Carro;

class CarController extends Controller
{
    /**
     * @Route("/", name="index_cars")
     * @Template("CodeCarBundle:Car:index.html.twig")
     */
    //2ª Etapa do Projeto - Gerenciamento de Carros
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

    // 3ª Etapa do Projeto - Gerenciamento de Carros
    /**
    * @Route("/doctrine", name="doctrine_cars")
    * @Template("CodeCarBundle:Car:doctrine.html.twig")
    */
    public function doctrineAction()
    {
        $carro = new Carro;
        $carro->setModelo("Model 03");
        $carro->setFabricante("Fabricante 03");
        $carro->setAno(2004);
        $carro->setCor("Branco");

        $manager = $this->getDoctrine()->getEntityManager();
        $manager->persist($carro);
        $manager->flush();


        $repository = $manager->getRepository("CodeCarBundle:Carro");
        $carros = $repository->findAll();

        return $this->render('CodeCarBundle:Car:doctrine.html.twig', ['carros'=>$carros]);
    }
}
