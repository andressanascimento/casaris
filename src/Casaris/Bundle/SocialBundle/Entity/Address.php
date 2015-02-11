<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\AddressRepository")
 */
class Address
{

    /**
     * @var integer
     * 
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id_address", type="integer")
     */
    private $idAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=80)
     */
    private $street;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer", length=6)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="complement", type="string", length=15)
     */
    private $complement;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_city", type="integer")
     */
    private $idCity;

    /**
     * @var integer
     *
     * @ORM\Column(name="zip", type="integer", length=7)
     */
    private $zip;


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
     * Set idAddress
     *
     * @param integer $idAddress
     * @return Address
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
     * Set street
     *
     * @param string $street
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return Address
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set complement
     *
     * @param string $complement
     * @return Address
     */
    public function setComplement($complement)
    {
        $this->complement = $complement;

        return $this;
    }

    /**
     * Get complement
     *
     * @return string 
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * Set idCity
     *
     * @param integer $idCity
     * @return Address
     */
    public function setIdCity($idCity)
    {
        $this->idCity = $idCity;

        return $this;
    }

    /**
     * Get idCity
     *
     * @return integer 
     */
    public function getIdCity()
    {
        return $this->idCity;
    }

    /**
     * Set zip
     *
     * @param integer $zip
     * @return Address
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return integer 
     */
    public function getZip()
    {
        return $this->zip;
    }
}
