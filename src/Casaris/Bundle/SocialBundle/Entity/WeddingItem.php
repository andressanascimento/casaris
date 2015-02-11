<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WeddingItem
 *
 * @ORM\Table(name="wedding_item")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\WeddingItemRepository")
 */
class WeddingItem
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id_wedding_item", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idWeddingItem;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id_wedding", type="integer")
     */
    private $idWedding;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id_category", type="integer")
     */
    private $idCategory;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=40)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="budget", type="decimal")
     */
    private $budget;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="check_item", type="boolean")
     */
    private $checkItem;

    /**
     * @var string
     *
     * @ORM\Column(name="priority_level", type="string", length=1)
     */
    private $priorityLevel;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="planning_date", type="date")
     */
    private $planningDate;

    /**
     * Set idWeddingItem
     *
     * @param integer $idWeddingItem
     * @return WeddingItem
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
     * Set name
     *
     * @param string $name
     * @return WeddingItem
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
     * Set budget
     *
     * @param string $budget
     * @return WeddingItem
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

    /**
     * Set description
     *
     * @param string $description
     * @return WeddingItem
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
     * Set checkItem
     *
     * @param boolean $checkItem
     * @return WeddingItem
     */
    public function setCheckItem($checkItem)
    {
        $this->checkItem = $checkItem;

        return $this;
    }

    /**
     * Get checkItem
     *
     * @return boolean 
     */
    public function getCheckItem()
    {
        return $this->checkItem;
    }

    /**
     * Set priorityLevel
     *
     * @param string $priorityLevel
     * @return WeddingItem
     */
    public function setPriorityLevel($priorityLevel)
    {
        $this->priorityLevel = $priorityLevel;

        return $this;
    }

    /**
     * Get priorityLevel
     *
     * @return string 
     */
    public function getPriorityLevel()
    {
        return $this->priorityLevel;
    }

    /**
     * Set planningDate
     *
     * @param \DateTime $planningDate
     * @return WeddingItem
     */
    public function setPlanningDate($planningDate)
    {
        $this->planningDate = $planningDate;

        return $this;
    }

    /**
     * Get planningDate
     *
     * @return \DateTime 
     */
    public function getPlanningDate()
    {
        return $this->planningDate;
    }

    /**
     * Set idWedding
     *
     * @param integer $idWedding
     * @return WeddingItem
     */
    public function setIdWedding($idWedding)
    {
        $this->idWedding = $idWedding;

        return $this;
    }

    /**
     * Get idWedding
     *
     * @return integer 
     */
    public function getIdWedding()
    {
        return $this->idWedding;
    }
}
