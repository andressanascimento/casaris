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

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param integer $user
     * @return Recomendation
     */
    public function setUser($user) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set supplier
     *
     * @param integer $supplier
     * @return Recomendation
     */
    public function setSupplier($supplier) {
        $this->supplier = $supplier;

        return $this;
    }

    /**
     * Get supplier
     *
     * @return integer 
     */
    public function getSupplier() {
        return $this->supplier;
    }

    /**
     * Set userLocale
     *
     * @param integer $userLocale
     * @return Recomendation
     */
    public function setUserLocale($userLocale) {
        $this->userLocale = $userLocale;

        return $this;
    }

    /**
     * Get userLocale
     *
     * @return integer 
     */
    public function getUserLocale() {
        return $this->userLocale;
    }

    /**
     * Set supplierLocale
     *
     * @param integer $supplierLocale
     * @return Recomendation
     */
    public function setSupplierLocale($supplierLocale) {
        $this->supplierLocale = $supplierLocale;

        return $this;
    }

    /**
     * Get supplierLocale
     *
     * @return integer 
     */
    public function getSupplierLocale() {
        return $this->supplierLocale;
    }

    /**
     * Set category
     *
     * @param integer $category
     * @return Recomendation
     */
    public function setCategory($category) {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return integer 
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     * @return Recomendation
     */
    public function setDatetime($datetime) {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime 
     */
    public function getDatetime() {
        return $this->datetime;
    }

}
