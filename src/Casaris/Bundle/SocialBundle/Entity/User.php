<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @UniqueEntity("email", message = "unique_email")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable {

    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message = "not_blank")
     * @ORM\Column(type="string", length=80)
     */
    private $name;

    /**
     * @var string
     * @Assert\NotBlank(message = "not_blank")
     * @Assert\Email(message = "O e-mail '{{ value }}' não é valido")
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @var string
     * @Assert\NotBlank(message = "not_blank")
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $type;

    /**
     * @OneToMany(targetEntity="Client", mappedBy="user")
     * */
    private $client;

    /**
     * @OneToMany(targetEntity="Company", mappedBy="user")
     * */
    private $company;
    
    /**
     * @ManyToOne(targetEntity="Document")
     * @JoinColumn(name="photo_id", referencedColumnName="id"))
     * */
    private $photo;
    
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

     /**
     * @inheritDoc
     */
    public function getUsername() {
        return $this->email;
    }

    /**
     * @inheritDoc
     */
    public function getSalt() {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @inheritDoc
     */
    public function getRoles() {
        $role = array('ROLE_USER');
        if ($this->getType() == 'client') {
            $role = array('ROLE_USER');
        } else {
            $role = array('ROLE_COMPANY');
        }
        return $role;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
        
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize() {
        return serialize(array(
            $this->id,
            $this->email,
            $this->password,
                // see section on salt below
                // $this->salt,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized) {
        list (
                $this->id,
                $this->email,
                $this->password,
                // see section on salt below
                // $this->salt
                ) = unserialize($serialized);
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getType() {
        return $this->type;
    }

    public function getClient() {
        return $this->client;
    }

    public function getCompany() {
        return $this->company;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setType($type) {
        $this->type = $type;
    }

}
