<?php
namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Table(name="activity_type")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\ActivityTypeRepository")
 */
class ActivityType {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $name;

}
