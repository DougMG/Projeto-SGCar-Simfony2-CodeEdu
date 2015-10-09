<?php
namespace Code\CarBundle\Service;
use Code\CarBundle\Entity\FabricanteInterface;

class FabricanteService implements FabricanteInterface {
	private $em;

	public function __construct(\Doctrine\ORM\EntityManagerInterface $em) {
		$this->em = $em;
	}

	public function insert($entity) {
		$em = $this->em;
		$em->persist($entity);
		$em->flush();

		return $entity;
	}

	public function selectFabricanteID($id) {

		$em = $this->em;
		$entity = $em->getRepository("CodeCarBundle:Fabricante")->find($id);

		return $entity;
	}

	public function selectFabricanteAll() {
		$em = $this->em;

		return $em->getRepository("CodeCarBundle:Fabricante")->findAll();
	}

	public function deleteFabricanteID($entity) {
		$em = $this->em;
		$em->remove($entity);
		$em->flush();
	}
}
?>