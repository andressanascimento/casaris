<?php

namespace Casaris\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * File
 *
 * @ORM\Table(name="file")
 * @ORM\Entity(repositoryClass="Casaris\Bundle\CoreBundle\Repository\FileRepository")
 */
class File
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id_file", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idFile;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=60)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="file", type="blob")
     */
    private $file;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=3)
     */
    private $type;
    
    /**
     * @var \Datetime
     *
     * @ORM\Column(name="date_create", type="datetime")
     */
    private $dateCreate;


    /**
     * Set idFile
     *
     * @param integer $idFile
     * @return File
     */
    public function setIdFile($idFile)
    {
        $this->idFile = $idFile;

        return $this;
    }

    /**
     * Get idFile
     *
     * @return integer 
     */
    public function getIdFile()
    {
        return $this->idFile;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return File
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return File
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set file
     *
     * @param string $file
     * @return File
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return File
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}
