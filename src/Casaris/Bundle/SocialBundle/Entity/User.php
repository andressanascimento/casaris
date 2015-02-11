<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\UserRepository")
 */
class User
{
    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $openid;


    /**
     * @var string
     * @ORM\Column(type="string", length=80)
     */
    private $name;
    
    /**
     * @var datetime
     * @ORM\Column(type="datetime")
     */
    private $birthday;
    
    /**
     * @var string
     * @ORM\Column(type="string", length=11)
     */
    private $cpf;
    
    /**
     * @var integer
     * @ORM\Column(type="integer", name="id_address")
     */
    private $address;
    
    /**
     * @var string
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;
    
    /**
     * @var integer
     * @ORM\Column(type="string", name="phone", nullable=true, length=13)
     */
    private $phone;

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
     * @ORM\Column(type="string", length=1)
     */
    private $gender;
    
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true, length=150)
     */
    private $phrase;
    
    private $friends;


    public function getId() {
        return $this->id;
    }

    public function getOpenid() {
        return $this->openid;
    }

    public function getName() {
        return $this->name;
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

    public function getEmail() {
        return $this->email;
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

    public function setId($id) {
        $this->id = $id;
    }

    public function setOpenid($openid) {
        $this->openid = $openid;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setBirthday(datetime $birthday) {
        $this->birthday = $birthday;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setEmail($email) {
        $this->email = $email;
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


}
