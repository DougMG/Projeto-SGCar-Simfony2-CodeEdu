<?php
namespace Code\CarBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Code\CarBundle\Entity\Fabricante;
use Code\CarBundle\Form\FabricanteType;
use Symfony\Component\HttpFoundation\Request;

/**
*@Route("/fabricante")
*/
class FabricanteController extends Controller{

	/**
	*@Route("/", name="fabricantes_lista")
	*@Template()
	*/
	public function indexAction(){

		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository("CodeCarBundle:Fabricante");

		$fabricantes = $repository->findAll();

		return ['fabricantes'=>$fabricantes];
	}

	/**
	*@Route("/new", name="new_fabricante")
	*@Template()
	*/
	public function newAction(){
		$fabricante = new Fabricante();
		$form = $this->createForm(new FabricanteType(), $fabricante);

		return ['fabricante'=>$fabricante, 'form'=>$form->createView()];
	}

	/**
	*@Route("/create", name="fabricante_create")
	*@Template("CodeCarBundle:Fabricante:new.html.twig")
	*/
	public function createAction(Request $request){
		$fabricante = new Fabricante();
		$form = $this->createForm(new FabricanteType(), $fabricante);

		$form->bind($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($fabricante);
			$em->flush();

			return $this->redirect($this->generateUrl('fabricantes_lista'));
		}

		return [
			'fabricante'=>$fabricante,
			'form'=>$form->createView()
		];
	}

}

?>
