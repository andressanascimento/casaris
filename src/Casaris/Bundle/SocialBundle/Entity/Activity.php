<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Table(name="activity")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\ActivityRepository")
 */
class Activity {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="ActivityType")
     * @JoinColumn(name="activity_type_id", referencedColumnName="id", nullable=false)
     * */
    private $activityType;

    /**
     * @ORM\Column(type="string", name="content", nullable=true)
     */
    private $content;

    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     * */
    private $user;

    /**
     * @ManyToOne(targetEntity="Document")
     * @JoinColumn(name="document_id", referencedColumnName="id")
     * */
    private $document;

    /**
     * @ORM\Column(type="datetime", name="date")
     */
    private $datetime;
    
    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="other_user_id", referencedColumnName="id", nullable=false, nullable=true)
     * */
    private $other;
    

    /**
     * @OneToMany(targetEntity="Comment", mappedBy="activity")
     */
    private $comments;
    
    
    public function getId() {
        return $this->id;
    }

    public function getActivityType() {
        return $this->activityType;
    }

    public function getContent() {
        return $this->content;
    }

    public function getUser() {
        return $this->user;
    }

    public function getDocument() {
        return $this->document;
    }

    public function getDatetime() {
        return $this->datetime;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setActivityType($activityType) {
        $this->activityType = $activityType;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setDocument($document) {
        $this->document = $document;
    }

    public function setDatetime($datetime) {
        $this->datetime = $datetime;
    }
    
    public function getOther() {
        return $this->other;
    }

    public function getComments() {
        return $this->comments;
    }

    public function setOther($other) {
        $this->other = $other;
    }

    public function setComments($comments) {
        $this->comments = $comments;
    }


    
}
