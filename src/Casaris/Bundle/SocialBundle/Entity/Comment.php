<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * PostComment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\CommentRepository")
 */
class Comment
{    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ManyToOne(targetEntity="Activity", inversedBy="comments")
     * @JoinColumn(name="activity_id", referencedColumnName="id")
     * */
    private $activity;

    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     * */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime", name="date")
     */
    private $datetime;

    public function getId() {
        return $this->id;
    }

    public function getActivity() {
        return $this->activity;
    }

    public function getUser() {
        return $this->user;
    }

    public function getContent() {
        return $this->content;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setActivity($activity) {
        $this->activity = $activity;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getDatetime() {
        return $this->datetime;
    }

    public function setDatetime($datetime) {
        $this->datetime = $datetime;
    }
}
