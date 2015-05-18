<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * City
 *
 * @ORM\Table(name="city")
 * @ORM\Entity()
 */
class City {

    /**
     * @var integer
     * 
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="State")
     * @JoinColumn(name="state", referencedColumnName="id")
     * */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="uf", type="string", length=4)
     */
    private $uf;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    public function getId() {
        return $this->id;
    }

    public function getState() {
        return $this->state;
    }

    public function getUf() {
        return $this->uf;
    }

    public function getName() {
        return $this->name;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function setUf($uf) {
        $this->uf = $uf;
    }

    public function setName($name) {
        $this->name = $name;
    }

}
