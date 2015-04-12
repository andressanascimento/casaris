<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * City
 *
 * @ORM\Table(name="city")
 * @ORM\Entity()
 */
class City {

    /**
     * @var integer
     * 
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="integer", length=2)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="uf", type="string", length=4)
     */
    private $uf;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

}
