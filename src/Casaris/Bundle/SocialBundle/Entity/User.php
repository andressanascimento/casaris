<?php

namespace Casaris\Bundle\SocialBundle\Entity;

use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="Casaris\Bundle\SocialBundle\Repository\UserRepository")
 * @ORM\Table(name="user")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"client" = "Client", "company" = "Company"})
 * @UniqueEntity("email", message = "unique_email")
 */
abstract class User implements UserInterface, \Serializable {
    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @Assert\NotBlank(message = "not_blank")
     * @ORM\Column(type="string", length=80)
     */
    protected $name;

    /**
     * @var string
     * @Assert\NotBlank(message = "not_blank")
     * @Assert\Email(message = "O e-mail '{{ value }}' não é valido")
     * @ORM\Column(type="string", length=60, unique=true)
     */
    protected $email;

    /**
     * @var string
     * @Assert\NotBlank(message = "not_blank")
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @var Document $photo
     * @ManyToOne(targetEntity="Document", cascade={"all"})
     * @JoinColumn(name="photo_id", referencedColumnName="id"))
     * */
    protected $photo;

    /**
     * @var Document $background
     * @ManyToOne(targetEntity="Document")
     * @JoinColumn(name="background_photo_id", referencedColumnName="id"))
     * */
    protected $background;

    /**
     * @ManyToMany(targetEntity="User")
     * @JoinTable(name="friends",
     *      joinColumns={@JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="friend_id", referencedColumnName="id")}
     *      )
     * */
    protected $friends;
    
    /**
     * @ManyToOne(targetEntity="City")
     * @JoinColumn(name="city", referencedColumnName="id")
     * */
    protected $city;

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

    public function setPassword($password) {
        $this->password = $password;
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
    public function getFriends() {
        return $this->friends;
    }

    public function setFriends($friends) {
        $this->friends = $friends;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function getBackground() {
        return $this->background;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    public function setBackground_photo($background_photo) {
        $this->background_photo = $background_photo;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

}
