<?php
namespace Code\CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Table()
* @ORM\Entity()
*/
class Carro{

    /**
    * @var integer
    * @ORM\Column(name="id", type="integer", length=255)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;

    /**
    * @var string
    * @ORM\Column(name="modelo", type="string", length=100)
    */
    private $modelo;

    /**
    * @var string
    * @ORM\Column(name="fabricante", type="string", length=100)
    */
    private $fabricante;

    /**
    * @var integer
    * @ORM\Column(name="ano", type="integer", length=15)
    */
    private $ano;

    /**
    * @var string
    * @ORM\Column(name="cor", type="string", length=100)
    */
    private $cor;


    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getModelo(){
        return $this->modelo;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function getFabricante(){
        return $this->fabricante;
    }

    public function setFabricante($fabricante){
        $this->fabricante = $fabricante;
    }

    public function getAno(){
        return $this->ano;
    }

    public function setAno($ano){
        $this->ano = $ano;
    }

    public function getCor(){
        return $this->cor;
    }

    public function setCor($cor){
        $this->cor = $cor;
    }

}
?>