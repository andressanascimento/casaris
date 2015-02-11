<?php

namespace Casaris\Bundle\BusinessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BudgetRequestItem
 *
 * @ORM\Table(name="budget_request_item")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\BusinessBundle\Repository\BudgetRequestItemRepository")
 */
class BudgetRequestItem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_budget_request_item", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idBudgetRequestItem;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_budget_request", type="integer")
     */
    private $idBudgetRequest;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_wedding_item", type="integer")
     */
    private $idWeddingItem;

    /**
     * @var string
     *
     * @ORM\Column(name="budget", type="decimal")
     */
    private $budget;


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
     * Set idBudgetRequestItem
     *
     * @param integer $idBudgetRequestItem
     * @return BudgetRequestItem
     */
    public function setIdBudgetRequestItem($idBudgetRequestItem)
    {
        $this->idBudgetRequestItem = $idBudgetRequestItem;

        return $this;
    }

    /**
     * Get idBudgetRequestItem
     *
     * @return integer 
     */
    public function getIdBudgetRequestItem()
    {
        return $this->idBudgetRequestItem;
    }

    /**
     * Set idBudgetRequest
     *
     * @param integer $idBudgetRequest
     * @return BudgetRequestItem
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
     * Set idWeddingItem
     *
     * @param integer $idWeddingItem
     * @return BudgetRequestItem
     */
    public function setIdWeddingItem($idWeddingItem)
    {
        $this->idWeddingItem = $idWeddingItem;

        return $this;
    }

    /**
     * Get idWeddingItem
     *
     * @return integer 
     */
    public function getIdWeddingItem()
    {
        return $this->idWeddingItem;
    }

    /**
     * Set budget
     *
     * @param string $budget
     * @return BudgetRequestItem
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
