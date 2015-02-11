<?php

namespace Casaris\Bundle\BusinessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\BusinessBundle\Repository\CompanyRepository")
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="cnpj", type="string", length=14)
     */
    private $cnpj;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_category", type="integer")
     */
    private $idCategory;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_address", type="integer")
     */
    private $idAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=12)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="cellphone", type="string", length=12)
     */
    private $cellphone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="score_total", type="decimal")
     */
    private $scoreTotal;

    /**
     * @var integer
     *
     * @ORM\Column(name="store_time", type="integer")
     */
    private $storeTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="score_star", type="integer")
     */
    private $scoreStar;

    /**
     * @var integer
     *
     * @ORM\Column(name="n_deals", type="integer")
     */
    private $nDeals;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_opening", type="datetime")
     */
    private $dateOpening;
    
    
    private $comments;


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
     * Set scoreTotal
     *
     * @param string $scoreTotal
     * @return Company
     */
    public function setScoreTotal($scoreTotal)
    {
        $this->scoreTotal = $scoreTotal;

        return $this;
    }

    /**
     * Get scoreTotal
     *
     * @return string 
     */
    public function getScoreTotal()
    {
        return $this->scoreTotal;
    }

    /**
     * Set storeTime
     *
     * @param integer $storeTime
     * @return Company
     */
    public function setStoreTime($storeTime)
    {
        $this->storeTime = $storeTime;

        return $this;
    }

    /**
     * Get storeTime
     *
     * @return integer 
     */
    public function getStoreTime()
    {
        return $this->storeTime;
    }

    /**
     * Set scoreStar
     *
     * @param integer $scoreStar
     * @return Company
     */
    public function setScoreStar($scoreStar)
    {
        $this->scoreStar = $scoreStar;

        return $this;
    }

    /**
     * Get scoreStar
     *
     * @return integer 
     */
    public function getScoreStar()
    {
        return $this->scoreStar;
    }

    /**
     * Set nDeals
     *
     * @param integer $nDeals
     * @return Company
     */
    public function setNDeals($nDeals)
    {
        $this->nDeals = $nDeals;

        return $this;
    }

    /**
     * Get nDeals
     *
     * @return integer 
     */
    public function getNDeals()
    {
        return $this->nDeals;
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
}
