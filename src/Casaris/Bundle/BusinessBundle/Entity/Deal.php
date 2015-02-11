<?php

namespace Casaris\Bundle\BusinessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Deal
 *
 * @ORM\Table(name="deal")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\BusinessBundle\Entity\DealRepository")
 */
class Deal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_deal", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idDeal;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_company", type="integer")
     */
    private $idCompany;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer")
     */
    private $idUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_budget_request", type="integer")
     */
    private $idBudgetRequest;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_file", type="integer")
     */
    private $idFile;

    /**
     * @var integer
     *
     * @ORM\Column(name="score_star", type="integer")
     */
    private $scoreStar;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;


    /**
     * Set idDeal
     *
     * @param integer $idDeal
     * @return Deal
     */
    public function setIdDeal($idDeal)
    {
        $this->idDeal = $idDeal;

        return $this;
    }

    /**
     * Get idDeal
     *
     * @return integer 
     */
    public function getIdDeal()
    {
        return $this->idDeal;
    }

    /**
     * Set idCompany
     *
     * @param integer $idCompany
     * @return Deal
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
     * Set idUser
     *
     * @param integer $idUser
     * @return Deal
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idBudgetRequest
     *
     * @param integer $idBudgetRequest
     * @return Deal
     */
    public function setIdBudgetRequest($idBudgetRequest)
    {
        $this->idBudgetRequest = $idBudgetRequest;

        return $this;
    }

    /**
     * Get idBudgetRequest
     *
     * @return integer 
     */
    public function getIdBudgetRequest()
    {
        return $this->idBudgetRequest;
    }

    /**
     * Set idFile
     *
     * @param integer $idFile
     * @return Deal
     */
    public function setIdFile($idFile)
    {
        $this->idFile = $idFile;

        return $this;
    }

    /**
     * Get idFile
     *
     * @return integer 
     */
    public function getIdFile()
    {
        return $this->idFile;
    }

    /**
     * Set scoreStar
     *
     * @param integer $scoreStar
     * @return Deal
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
     * Set date
     *
     * @param \DateTime $date
     * @return Deal
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

}
