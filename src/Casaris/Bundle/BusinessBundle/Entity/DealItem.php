<?php

namespace Casaris\Bundle\BusinessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DealItem
 *
 * @ORM\Table(name="deal_item")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\BusinessBundle\Repository\DealItemRepository")
 */
class DealItem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_deal_item", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idDealItem;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_deal", type="integer")
     */
    private $idDeal;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_item", type="integer")
     */
    private $idItem;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=1)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="discount", type="decimal")
     */
    private $discount;

    /**
     * Set idDealItem
     *
     * @param integer $idDealItem
     * @return DealItem
     */
    public function setIdDealItem($idDealItem)
    {
        $this->idDealItem = $idDealItem;

        return $this;
    }

    /**
     * Get idDealItem
     *
     * @return integer 
     */
    public function getIdDealItem()
    {
        return $this->idDealItem;
    }

    /**
     * Set idDeal
     *
     * @param integer $idDeal
     * @return DealItem
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
     * Set idItem
     *
     * @param integer $idItem
     * @return DealItem
     */
    public function setIdItem($idItem)
    {
        $this->idItem = $idItem;

        return $this;
    }

    /**
     * Get idItem
     *
     * @return integer 
     */
    public function getIdItem()
    {
        return $this->idItem;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return DealItem
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set discount
     *
     * @param string $discount
     * @return DealItem
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return string 
     */
    public function getDiscount()
    {
        return $this->discount;
    }
}
