<?php

namespace Casaris\Bundle\BusinessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Portfolio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Casaris\Bundle\BusinessBundle\Repository\PortfolioRepository")
 */
class Portfolio
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id_portfolio", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idPortfolio;

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
     * @var string
     *
     * @ORM\Column(name="photo", type="blob")
     */
    private $photo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_company", type="integer")
     */
    private $idCompany;

    /**
     * Set idPortfolio
     *
     * @param integer $idPortfolio
     * @return Portfolio
     */
    public function setIdPortfolio($idPortfolio)
    {
        $this->idPortfolio = $idPortfolio;

        return $this;
    }

    /**
     * Get idPortfolio
     *
     * @return integer 
     */
    public function getIdPortfolio()
    {
        return $this->idPortfolio;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Portfolio
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
     * @return Portfolio
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
     * Set photo
     *
     * @param string $photo
     * @return Portfolio
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Portfolio
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
     * Set idCompany
     *
     * @param integer $idCompany
     * @return Portfolio
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
}
