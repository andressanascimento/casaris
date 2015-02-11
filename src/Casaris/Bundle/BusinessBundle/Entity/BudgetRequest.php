<?php

namespace Casaris\Bundle\BusinessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BudgetRequest
 *
 * @ORM\Table(name="budget_request")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\BusinessBundle\Repository\BudgetRequestRepository")
 */
class BudgetRequest
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_budget_request", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idBudgetRequest;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer")
     */
    private $idUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_company", type="integer")
     */
    private $idCompany;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=60)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_category", type="integer")
     */
    private $idCategory;

    /**
     * @var string
     *
     * @ORM\Column(name="budget", type="decimal")
     */
    private $budget;


    /**
     * Set idBudgetRequest
     *
     * @param integer $idBudgetRequest
     * @return BudgetRequest
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
     * Set idUser
     *
     * @param integer $idUser
     * @return BudgetRequest
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
     * Set idCompany
     *
     * @param integer $idCompany
     * @return BudgetRequest
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
     * Set title
     *
     * @param string $title
     * @return BudgetRequest
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return BudgetRequest
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return BudgetRequest
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

    /**
     * Set idCategory
     *
     * @param integer $idCategory
     * @return BudgetRequest
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
     * Set budget
     *
     * @param string $budget
     * @return BudgetRequest
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return string 
     */
    public function getBudget()
    {
        return $this->budget;
    }
}
