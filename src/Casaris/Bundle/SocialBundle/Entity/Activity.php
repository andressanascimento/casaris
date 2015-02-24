<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Table(name="activity")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\ActivityRepository")
 */
class Activity {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     * */
    private $user;

    /**
     * @ORM\Column(type="integer", name="id_source")
     */
    private $source;

    /**
     * @ManyToOne(targetEntity="ActivityType")
     * @JoinColumn(name="activity_type_id", referencedColumnName="id")
     * */
    private $activity;

    /*
     * @ORM\Column(type="datetime", name="date")
     */
    private $datetime;

    public function getId() {
        return $this->id;
    }

    public function getUser() {
        return $this->user;
    }

    public function getSource() {
        return $this->source;
    }

    public function getActivity() {
        return $this->activity;
    }

    public function getComment() {
        return $this->comment;
    }

    public function getDatetime() {
        return $this->datetime;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setSource($source) {
        $this->source = $source;
    }

    public function setActivity($activity) {
        $this->activity = $activity;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }

    public function setDatetime($datetime) {
        $this->datetime = $datetime;
    }


    
}
