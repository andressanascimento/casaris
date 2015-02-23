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

    /*
     * @ORM\Column(type="integer" name="id_source")
     */
    private $source;

    /**
     * @ManyToOne(targetEntity="ActivityType")
     * @JoinColumn(name="activity_type_id", referencedColumnName="id")
     * */
    private $activity;

    /**
     * @ManyToOne(targetEntity="Comment")
     * @JoinColumn(name="comment_id", referencedColumnName="id")
     * */
    private $comment;

    /*
     * @ORM\Column(type="datetime", name="date")
     */
    private $datetime;

}
