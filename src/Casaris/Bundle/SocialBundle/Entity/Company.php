<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Casaris\Bundle\SocialBundle\Entity\User;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * Company
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\CompanyRepository")
 */
class Company extends User
{
    protected $type = 'client';

    /**
     * @var string
     *
     * @ORM\Column(name="cnpj", type="string", length=14, nullable=true)
     */
    private $cnpj;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_category", type="integer", nullable=true)
     */
    private $idCategory;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_address", type="integer", nullable=true)
     */
    private $idAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=12, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="cellphone", type="string", length=12, nullable=true)
     */
    private $cellphone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_opening", type="datetime", nullable=true)
     */
    private $dateOpening;
    
     /**
     * @OneToMany(targetEntity="CompanyComment", mappedBy="company")
     **/
    private $comments;
    
    /**
     * @ManyToMany(targetEntity="Client", mappedBy="companies")
     **/
    private $followers;
    
    public function __construct()
    {
        $this->followers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getType() {
        return $this->type;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getIdCategory() {
        return $this->idCategory;
    }

    public function getIdAddress() {
        return $this->idAddress;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getCellphone() {
        return $this->cellphone;
    }

    public function getDateOpening() {
        return $this->dateOpening;
    }

    public function getComments() {
        return $this->comments;
    }

    public function getFollowers() {
        return $this->followers;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function setIdCategory($idCategory) {
        $this->idCategory = $idCategory;
    }

    public function setIdAddress($idAddress) {
        $this->idAddress = $idAddress;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setCellphone($cellphone) {
        $this->cellphone = $cellphone;
    }

    public function setDateOpening(\DateTime $dateOpening) {
        $this->dateOpening = $dateOpening;
    }

    public function setComments($comments) {
        $this->comments = $comments;
    }

    public function setFollowers($followers) {
        $this->followers = $followers;
    }


}
