<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Table(name="cluster")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\GroupRepository")
 */
class Group {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id", nullable=false, unique=true)
     * */
    private $user;

    /**
     * @ORM\Column(type="integer", name="cluster")
     */
    private $group;
    
    public function getId() {
        return $this->id;
    }

    public function getUser() {
        return $this->user;
    }

    public function getGroup() {
        return $this->group;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setGroup($group) {
        $this->group = $group;
    }


    

}
