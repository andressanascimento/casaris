<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Casaris\Bundle\SocialBundle\Entity\User;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * Company
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\CompanyRepository")
 */
class Company extends User
{
    protected $type = 'company';

    /**
     * @var string
     *
     * @ORM\Column(name="cnpj", type="string", length=14, nullable=true)
     */
    private $cnpj;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=12, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="cellphone", type="string", length=12, nullable=true)
     */
    private $cellphone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_opening", type="datetime", nullable=true)
     */
    private $dateOpening;
    
     /**
     * @OneToMany(targetEntity="CompanyComment", mappedBy="company")
     **/
    private $comments;
    
    /**
     * @ManyToMany(targetEntity="Client", mappedBy="companies")
     **/
    private $followers;
    
    /**
     * @ManyToMany(targetEntity="Category")
     * @JoinTable(name="company_category",
     *      joinColumns={@JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="category_id", referencedColumnName="id")}
     *      )
     * */
    private $category;
    
    public function __construct()
    {
        $this->followers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function addCategory(Category $category) {
        $this->category[] = $category;
    }
    
    public function getType() {
        return $this->type;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getCellphone() {
        return $this->cellphone;
    }

    public function getDateOpening() {
        return $this->dateOpening;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setCellphone($cellphone) {
        $this->cellphone = $cellphone;
    }

    public function setDateOpening(\DateTime $dateOpening) {
        $this->dateOpening = $dateOpening;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }



}
