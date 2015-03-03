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
     * @ManyToOne(targetEntity="Client")
     * @JoinColumn(name="client_id", referencedColumnName="id")
     * */
    private $client;

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

    public function getClient() {
        return $this->client;
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

    public function setClient($client) {
        $this->client = $client;
    }

    public function setDocument($document) {
        $this->document = $document;
    }

    public function setDate(\DateTime $date) {
        $this->date = $date;
    }


}
