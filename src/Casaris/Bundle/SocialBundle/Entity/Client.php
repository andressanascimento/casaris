<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * User
 *
 * @UniqueEntity("user")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\ClientRepository")
 */
class Client {

    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var datetime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $birthday;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $cpf;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="id_address", nullable=true)
     */
    private $address;

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
     *      inverseJoinColumns={@JoinColumn(name="company_id", referencedColumnName="id_company", unique=true)}
     *      )
     * */
    private $companies;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="client")
     * @JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     * */
    private $user;
    
    /**
     * @OneToMany(targetEntity="Gallery", mappedBy="client")
     * */
    private $gallery;

    public function __construct() {
        $this->friends = new \Doctrine\Common\Collections\ArrayCollection();
        $this->companies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getPhone() {
        return $this->phone;
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

    public function getUser() {
        return $this->user;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setBirthday(\Datetime $birthday) {
        $this->birthday = $birthday;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
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

    public function setUser($user) {
        $this->user = $user;
    }

}
