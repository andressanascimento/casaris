<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * Gallery
 *
 * @ORM\Table(name="gallery")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\GalleryRepository")
 */
class Gallery {

    /**
     * @ORM\Id
     * @ManyToOne(targetEntity="Client")
     * @JoinColumn(name="client_id", referencedColumnName="id")
     * */
    private $client;

    /**
     * @ORM\Id
     * @ManyToOne(targetEntity="Document")
     * @JoinColumn(name="document_id", referencedColumnName="id")
     * */
    private $document;

    /**
     *
     * @var date
     * @ORM\Column(name="date", type="date")
     */
    private $date;
    
    public function getClient() {
        return $this->client;
    }

    public function getDocument() {
        return $this->document;
    }

    public function getDate() {
        return $this->date;
    }

    public function setClient($client) {
        $this->client = $client;
    }

    public function setDocument($document) {
        $this->document = $document;
    }

    public function setDate(date $date) {
        $this->date = $date;
    }




}
