<?php
namespace Code\CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
* @ORM\Table()
* @ORM\Entity()
*/
class Fabricante
{
    /**
    * @var integer
    * @ORM\Column(name="id", type="integer", length=255 )
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;

    /**
    * @var string
    * @ORM\Column(name="nome", type="string", length=100 )
    */
    private $nome;

    /**
     * @ORM\OneToMany(targetEntity="Code\CarBundle\Entity\Carro", mappedBy="fabricante")
     **/
    private $carros;

    function __construct(){
        $this->carros = new ArrayCollection(); 
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getCarros(){
        return $this->carros;
    }

    public function setCarros($carros){
        $this->carros[] = $carros;
    }
}
?>