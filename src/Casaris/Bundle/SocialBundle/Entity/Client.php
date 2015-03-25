<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\ClientRepository")
 */
class Client extends User {

    protected $type = 'client';

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true, length=80)
     */
    private $city;
    
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true, length=2)
     */
    private $state;

    /**
     * @var \Datetime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $birthday;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true, length=11)
     */
    private $cpf;

    /**
     * @var integer
     * @ORM\Column(type="string", name="id_cellphone", nullable=true, length=13)
     */
    private $cellphone;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true, length=50)
     */
    private $profession;

    /**
     * @var string
     * @Assert\NotBlank(message = "not_blank")
     * @ORM\Column(type="string", nullable=true, length=1)
     */
    private $gender;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true, length=150)
     */
    private $phrase;

    /**
     * @ManyToMany(targetEntity="Company")
     * @JoinTable(name="favorite_companies",
     *      joinColumns={@JoinColumn(name="client_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="company_id", referencedColumnName="id", unique=true)}
     *      )
     * */
    private $companies;

    /**
     * @OneToMany(targetEntity="Gallery", mappedBy="client")
     * */
    private $gallery;

    public function __construct() {
        $this->friends = new \Doctrine\Common\Collections\ArrayCollection();
        $this->companies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getType() {
        return $this->type;
    }

    public function getCity() {
        return $this->city;
    }

    public function getState() {
        return $this->state;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getCellphone() {
        return $this->cellphone;
    }

    public function getProfession() {
        return $this->profession;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getPhrase() {
        return $this->phrase;
    }

    public function getCompanies() {
        return $this->companies;
    }

    public function getGallery() {
        return $this->gallery;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function setBirthday(\Datetime $birthday) {
        $this->birthday = $birthday;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setCellphone($cellphone) {
        $this->cellphone = $cellphone;
    }

    public function setProfession($profession) {
        $this->profession = $profession;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function setPhrase($phrase) {
        $this->phrase = $phrase;
    }

    public function setCompanies($companies) {
        $this->companies = $companies;
    }

    public function setGallery($gallery) {
        $this->gallery = $gallery;
    }

            
    public function __toString() {
        return $this->getName();
    }

}
