<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\PostRepository")
 */
class Post
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date; 

    public function getId() {
        return $this->id;
    }

    public function getUser() {
        return $this->user;
    }

    public function getContent() {
        return $this->content;
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

    public function setContent($content) {
        $this->content = $content;
    }

    public function setDate(\DateTime $date) {
        $this->date = $date;
    }


}
