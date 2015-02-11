<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wedding
 *
 * @ORM\Table(name="wedding")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\WeddingRepository")
 */
class Wedding
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_wedding", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idWedding;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer")
     */
    private $idUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="n_guests", type="integer" length=4)
     */
    private $nGuests;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hour", type="time")
     */
    private $hour;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_address_cerimony", type="integer")
     */
    private $idAddressCerimony;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_address_party", type="integer")
     */
    private $idAddressParty;

    /**
     * @var string
     *
     * @ORM\Column(name="name_partner", type="string", length=80)
     */
    private $namePartner;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=1)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="budget", type="decimal")
     */
    private $budget;

    /**
     * Set idWedding
     *
     * @param integer $idWedding
     * @return Wedding
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

    /**
     * Set idUser
     *
     * @param integer $idUser
     * @return Wedding
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
     * Set nGuests
     *
     * @param integer $nGuests
     * @return Wedding
     */
    public function setNGuests($nGuests)
    {
        $this->nGuests = $nGuests;

        return $this;
    }

    /**
     * Get nGuests
     *
     * @return integer 
     */
    public function getNGuests()
    {
        return $this->nGuests;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Wedding
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
     * Set hour
     *
     * @param \DateTime $hour
     * @return Wedding
     */
    public function setHour($hour)
    {
        $this->hour = $hour;

        return $this;
    }

    /**
     * Get hour
     *
     * @return \DateTime 
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * Set idAddressCerimony
     *
     * @param integer $idAddressCerimony
     * @return Wedding
     */
    public function setIdAddressCerimony($idAddressCerimony)
    {
        $this->idAddressCerimony = $idAddressCerimony;

        return $this;
    }

    /**
     * Get idAddressCerimony
     *
     * @return integer 
     */
    public function getIdAddressCerimony()
    {
        return $this->idAddressCerimony;
    }

    /**
     * Set idAddressParty
     *
     * @param integer $idAddressParty
     * @return Wedding
     */
    public function setIdAddressParty($idAddressParty)
    {
        $this->idAddressParty = $idAddressParty;

        return $this;
    }

    /**
     * Get idAddressParty
     *
     * @return integer 
     */
    public function getIdAddressParty()
    {
        return $this->idAddressParty;
    }

    /**
     * Set namePartner
     *
     * @param string $namePartner
     * @return Wedding
     */
    public function setNamePartner($namePartner)
    {
        $this->namePartner = $namePartner;

        return $this;
    }

    /**
     * Get namePartner
     *
     * @return string 
     */
    public function getNamePartner()
    {
        return $this->namePartner;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Wedding
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set budget
     *
     * @param string $budget
     * @return Wedding
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
