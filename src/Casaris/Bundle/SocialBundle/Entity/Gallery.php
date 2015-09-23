<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * Gallery
 *
 * @ORM\Table(name="gallery")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\GalleryRepository")
 */
class Gallery {
    
    /**
     * @var integer
     * 
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     */
    private $id;
    
    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     * */
    private $user;

    /**
     * @ManyToOne(targetEntity="Document", cascade={"remove"})
     * @JoinColumn(name="document_id", referencedColumnName="id")
     * */
    private $document;

    /**
     *
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $date;
    public function getId() {
        return $this->id;
    }

    public function getUser() {
        return $this->user;
    }

    public function getDocument() {
        return $this->document;
    }

    public function getDate() {
        return $this->date;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setDocument($document) {
        $this->document = $document;
    }

    public function setDate(\DateTime $date) {
        $this->date = $date;
    }


 
}
