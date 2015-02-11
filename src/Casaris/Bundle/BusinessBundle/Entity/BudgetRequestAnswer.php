<?php

namespace Casaris\Bundle\BusinessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BudgetRequestAnswer
 *
 * @ORM\Table(name="budget_request_answer")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\BusinessBundle\Repository\BudgetRequestAnswerRepository")
 */
class BudgetRequestAnswer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_budget_request_answer", type="integer")
     */
    private $idBudgetRequestAnswer;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_budget_request", type="integer")
     */
    private $idBudgetRequest;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="obs_company", type="text")
     */
    private $obsCompany;

    /**
     * @var integer
     *
     * @ORM\Column(name="score_time", type="integer")
     */
    private $scoreTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="score_answer", type="integer")
     */
    private $scoreAnswer;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_file", type="integer")
     */
    private $idFile;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


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
     * Set idBudgetRequestAnswer
     *
     * @param integer $idBudgetRequestAnswer
     * @return BudgetRequestAnswer
     */
    public function setIdBudgetRequestAnswer($idBudgetRequestAnswer)
    {
        $this->idBudgetRequestAnswer = $idBudgetRequestAnswer;

        return $this;
    }

    /**
     * Get idBudgetRequestAnswer
     *
     * @return integer 
     */
    public function getIdBudgetRequestAnswer()
    {
        return $this->idBudgetRequestAnswer;
    }

    /**
     * Set idBudgetRequest
     *
     * @param integer $idBudgetRequest
     * @return BudgetRequestAnswer
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
     * Set price
     *
     * @param string $price
     * @return BudgetRequestAnswer
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set obsCompany
     *
     * @param string $obsCompany
     * @return BudgetRequestAnswer
     */
    public function setObsCompany($obsCompany)
    {
        $this->obsCompany = $obsCompany;

        return $this;
    }

    /**
     * Get obsCompany
     *
     * @return string 
     */
    public function getObsCompany()
    {
        return $this->obsCompany;
    }

    /**
     * Set scoreTime
     *
     * @param integer $scoreTime
     * @return BudgetRequestAnswer
     */
    public function setScoreTime($scoreTime)
    {
        $this->scoreTime = $scoreTime;

        return $this;
    }

    /**
     * Get scoreTime
     *
     * @return integer 
     */
    public function getScoreTime()
    {
        return $this->scoreTime;
    }

    /**
     * Set scoreAnswer
     *
     * @param integer $scoreAnswer
     * @return BudgetRequestAnswer
     */
    public function setScoreAnswer($scoreAnswer)
    {
        $this->scoreAnswer = $scoreAnswer;

        return $this;
    }

    /**
     * Get scoreAnswer
     *
     * @return integer 
     */
    public function getScoreAnswer()
    {
        return $this->scoreAnswer;
    }

    /**
     * Set idFile
     *
     * @param integer $idFile
     * @return BudgetRequestAnswer
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
     * Set date
     *
     * @param \DateTime $date
     * @return BudgetRequestAnswer
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
