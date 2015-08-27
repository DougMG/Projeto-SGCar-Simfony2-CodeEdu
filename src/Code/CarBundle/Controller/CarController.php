<?php


namespace Code\CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Code\CarBundle\Entity\Carro;
use Code\CarBundle\Entity\Fabricante;

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
        $carro->setFabricante(NULL);
        $carro->setAno(2004);
        $carro->setCor("Branco");

        $manager = $this->getDoctrine()->getEntityManager();
        $manager->persist($carro);
        $manager->flush();


        $repository = $manager->getRepository("CodeCarBundle:Carro");
        $carros = $repository->findAll();

        return $this->render('CodeCarBundle:Car:doctrine.html.twig', ['carros'=>$carros]);
    }

    // 4ª Etapa do Projeto - Gerenciamento de Carros
    /**
    * @Route("/mapping", name="mapping_fabricante_carros")
    * @Template("CodeCarBundle:Car:mapping.html.twig")
    */
    public function mappingAction(){

        /*$fab = new Fabricante;
        $fab->setNome("Chevrolet");

        $car1 = new Carro;
        $car1->setModelo("Corsa");
        $car1->setFabricante($fab);
        $car1->setAno(2015);
        $car1->setCor("Vermelho");

        $car2 = new Carro;
        $car2->setModelo("Prisma");
        $car2->setFabricante($fab);
        $car2->setAno(2015);
        $car2->setCor("Branco");

        $car3 = new Carro;
        $car3->setModelo("Cobalt");
        $car3->setFabricante($fab);
        $car3->setAno(2015);
        $car3->setCor("Preto");*/

        $manager = $this->getDoctrine()->getEntityManager();
        /*$manager->persist($fab);
        $manager->persist($car1);
        $manager->persist($car2);
        $manager->persist($car3);
        //$manager->flush();

        $repository = $manager->getRepository("CodeCarBundle:Fabricante");
        $carros = $repository->find(1);*/
        $repository = $manager->getRepository("CodeCarBundle:Fabricante");
        $fabricante = $repository->find(3);

        return $this->render('CodeCarBundle:Car:mapping.html.twig', ['fabricante'=>$fabricante]);
    }
}
