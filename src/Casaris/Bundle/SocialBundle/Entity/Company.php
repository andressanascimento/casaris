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
class Company
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id_company", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idCompany;

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
     * @ManyToOne(targetEntity="User", inversedBy="company")
     * @JoinColumn(name="user_id", referencedColumnName="id", nullable=false )
     **/
    private $user;
    
    /**
     * @ManyToMany(targetEntity="Client", mappedBy="companies")
     **/
    private $followers;
    
    public function __construct()
    {
        $this->followers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idCompany
     *
     * @param integer $idCompany
     * @return Company
     */
    public function setIdCompany($idCompany)
    {
        $this->idCompany = $idCompany;

        return $this;
    }

    /**
     * Get idCompany
     *
     * @return integer 
     */
    public function getIdCompany()
    {
        return $this->idCompany;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Company
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set cnpj
     *
     * @param string $cnpj
     * @return Company
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    /**
     * Get cnpj
     *
     * @return string 
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set idCategory
     *
     * @param integer $idCategory
     * @return Company
     */
    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;

        return $this;
    }

    /**
     * Get idCategory
     *
     * @return integer 
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * Set idAddress
     *
     * @param integer $idAddress
     * @return Company
     */
    public function setIdAddress($idAddress)
    {
        $this->idAddress = $idAddress;

        return $this;
    }

    /**
     * Get idAddress
     *
     * @return integer 
     */
    public function getIdAddress()
    {
        return $this->idAddress;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Company
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set cellphone
     *
     * @param string $cellphone
     * @return Company
     */
    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;

        return $this;
    }

    /**
     * Get cellphone
     *
     * @return string 
     */
    public function getCellphone()
    {
        return $this->cellphone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Company
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set dateOpening
     *
     * @param \DateTime $dateOpening
     * @return Company
     */
    public function setDateOpening($dateOpening)
    {
        $this->dateOpening = $dateOpening;

        return $this;
    }

    /**
     * Get dateOpening
     *
     * @return \DateTime 
     */
    public function getDateOpening()
    {
        return $this->dateOpening;
    }
    
    public function getComments() {
        return $this->comments;
    }

    public function getUser() {
        return $this->user;
    }

    public function getFollowers() {
        return $this->followers;
    }

    public function setComments($comments) {
        $this->comments = $comments;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setFollowers($followers) {
        $this->followers = $followers;
    }


}
