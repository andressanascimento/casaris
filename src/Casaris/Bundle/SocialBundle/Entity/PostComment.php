<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PostComment
 *
 * @ORM\Table(name="post_comment")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\PostCommentRepository")
 */
class PostComment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_post_comment", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idPostComment;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_post", type="integer")
     */
    private $idPost;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idPostComment
     *
     * @param integer $idPostComment
     * @return PostComment
     */
    public function setIdPostComment($idPostComment)
    {
        $this->idPostComment = $idPostComment;

        return $this;
    }

    /**
     * Get idPostComment
     *
     * @return integer 
     */
    public function getIdPostComment()
    {
        return $this->idPostComment;
    }

    /**
     * Set idPost
     *
     * @param integer $idPost
     * @return PostComment
     */
    public function setIdPost($idPost)
    {
        $this->idPost = $idPost;

        return $this;
    }

    /**
     * Get idPost
     *
     * @return integer 
     */
    public function getIdPost()
    {
        return $this->idPost;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     * @return PostComment
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return PostComment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     * @return PostComment
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime 
     */
    public function getDatetime()
    {
        return $this->datetime;
    }
}
