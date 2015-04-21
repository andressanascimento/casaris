<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;

/**
 * Recomendation
 *
 * @ORM\Table(name="recomendation")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\RecomendationRepository")
 */
class Recomendation {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user", referencedColumnName="id")
     * */
    private $user;

    /**
     * @ManyToOne(targetEntity="Company")
     * @JoinColumn(name="supplier", referencedColumnName="id")
     * */
    private $supplier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;

    public function getId() {
        return $this->id;
    }

    public function getUser() {
        return $this->user;
    }

    public function getSupplier() {
        return $this->supplier;
    }

    public function getDatetime() {
        return $this->datetime;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setSupplier($supplier) {
        $this->supplier = $supplier;
    }

    public function setDatetime(\DateTime $datetime) {
        $this->datetime = $datetime;
    }


}
