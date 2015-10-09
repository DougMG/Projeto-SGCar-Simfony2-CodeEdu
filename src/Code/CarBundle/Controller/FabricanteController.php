<?php
namespace Code\CarBundle\Controller;
use Code\CarBundle\Entity\Fabricante;
use Code\CarBundle\Form\FabricanteType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 *@Route("/fabricante")
 */
class FabricanteController extends Controller {

	/**
	 *@Route("/", name="fabricantes_lista")
	 *@Template()
	 */
	public function indexAction() {

		//$em = $this->getDoctrine()->getManager();
		//$repository = $em->getRepository("CodeCarBundle:Fabricante");

		//$fabricantes = $repository->findAll();
		$fabricanteService = $this->get('code_car.service.fabricanteservice');
		$fabricantes = $fabricanteService->selectFabricanteAll();

		return ['fabricantes' => $fabricantes];
	}

	/**
	 *@Route("/new", name="new_fabricante")
	 *@Template()
	 */
	public function newAction() {
		$fabricante = new Fabricante();
		$form = $this->createForm(new FabricanteType(), $fabricante);

		return ['fabricante' => $fabricante, 'form' => $form->createView()];
	}

	/**
	 *@Route("/create", name="fabricante_create")
	 *@Template("CodeCarBundle:Fabricante:new.html.twig")
	 */
	public function createAction(Request $request) {
		$fabricante = new Fabricante();
		$form = $this->createForm(new FabricanteType(), $fabricante);

		$form->bind($request);

		if ($form->isValid()) {
			//$em = $this->getDoctrine()->getManager();
			//$em->persist($fabricante);
			//$em->flush();
			$fabricanteService = $this->get('code_car.service.fabricanteservice');
			$fabricanteService->insert($fabricante);

			return $this->redirect($this->generateUrl('fabricantes_lista'));
		}

		return [
			'fabricante' => $fabricante,
			'form' => $form->createView(),
		];
	}

	/**
	 *@Route("/{id}/edit", name="fabricante_edit")
	 *@Template()
	 */
	public function editAction($id) {
		//$em = $this->getDoctrine()->getManager();
		//$entity = $em->getRepository("CodeCarBundle:Fabricante")->find($id);
		$fabricanteService = $this->get('code_car.service.fabricanteservice');
		$entity = $fabricanteService->selectFabricanteID($id);

		if (!$entity) {
			throw $this->createNotFoundException("Fabricante Não Encontrado....");
		}

		$form = $this->createForm(new FabricanteType(), $entity);

		return [
			'entity' => $entity,
			'form' => $form->createView(),
		];
	}

	/**
	 *@Route("/{id}/update", name="fabricante_update")
	 *@Template("CodeCarBundle:Fabricante:edit.html.twig")
	 */
	public function updateAction(Request $request, $id) {
		//$em = $this->getDoctrine()->getManager();
		//$entity = $em->getRepository("CodeCarBundle:Fabricante")->find($id);
		$fabricanteService = $this->get('code_car.service.fabricanteservice');
		$entity = $fabricanteService->selectFabricanteID($id);

		if (!$entity) {
			throw $this->createNotFoundException("Fabricante Não Encontrado....");
		}

		$form = $this->createForm(new FabricanteType(), $entity);
		$form->bind($request);

		if ($form->isValid()) {

			//$em->persist($entity);
			//$em->flush();
			$fabricanteService->insert($entity);

			return $this->redirect($this->generateUrl("fabricantes_lista"));
		}

		return [
			'entity' => $entity,
			'form' => $form->createView(),
		];
	}

	/**
	 *@Route("/{id}/delete", name="fabricante_delete")
	 *@Template()
	 */
	public function deleteAction($id) {
		//$em = $this->getDoctrine()->getManager();
		//$entity = $em->getRepository("CodeCarBundle:Fabricante")->find($id);
		$fabricanteService = $this->get('code_car.service.fabricanteservice');
		$entity = $fabricanteService->selectFabricanteID($id);

		if (!$entity) {
			throw $this->NotFoundException("Fabricante Não Encontrado....");

		}

		//$em->remove($entity);
		//$em->flush();
		$fabricanteService->deleteFabricanteID($entity);

		return $this->redirect($this->generateUrl("fabricantes_lista"));
	}
}

?>
