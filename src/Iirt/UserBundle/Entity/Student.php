<?php

namespace Iirt\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Student
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Iirt\UserBundle\Entity\StudentRepository")
 * @ORM\Entity
 */
class Student
{
    /**
     * @ORM\ManyToMany(targetEntity="Iirt\UserBundle\Entity\Role", cascade={"persist"})
     */
    private $roles;

    /**
     * @ORM\ManyToOne(targetEntity="Iirt\UserBundle\Entity\Cycle", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $cycle;

    /**
     * @ORM\ManyToOne(targetEntity="Iirt\UserBundle\Entity\Formation", cascade={"persist"})
     */
    private $formation;

    /**
     * @return mixed
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * @param mixed $formation
     */
    public function setFormation($formation)
    {
        $this->formation = $formation;
    }

    /**
     * @return mixed
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @param mixed $niveau
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Iirt\UserBundle\Entity\Niveau", cascade={"persist"})
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity="Iirt\UserBundle\Entity\Path", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $path;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=255)
     * 
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $matricule;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     * 
     * @Assert\NotBlank()
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inscript_date", type="datetime")
     */
    private $inscriptDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="able", type="boolean")
     */
    private $able;

    /**
     * @var boolean
     *
     * @ORM\Column(name="connected", type="boolean")
     */
    private $connected;


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
     * Set firstname
     *
     * @param string $firstname
     * @return Student
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Student
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     * @return Student
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set matricule
     *
     * @param string $matricule
     * @return Student
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string 
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Student
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Student
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set inscriptDate
     *
     * @param \DateTime $inscriptDate
     * @return Student
     */
    public function setInscriptDate($inscriptDate)
    {
        $this->inscriptDate = $inscriptDate;

        return $this;
    }

    /**
     * Get inscriptDate
     *
     * @return \DateTime 
     */
    public function getInscriptDate()
    {
        return $this->inscriptDate;
    }

    /**
     * Set able
     *
     * @param boolean $able
     * @return Student
     */
    public function setAble($able)
    {
        $this->able = $able;

        return $this;
    }

    /**
     * Get able
     *
     * @return boolean 
     */
    public function getAble()
    {
        return $this->able;
    }

    /**
     * Set connected
     *
     * @param boolean $connected
     * @return Student
     */
    public function setConnected($connected)
    {
        $this->connected = $connected;

        return $this;
    }

    /**
     * Get connected
     *
     * @return boolean 
     */
    public function getConnected()
    {
        return $this->connected;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add roles
     *
     * @param \Iirt\UserBundle\Entity\Role $roles
     * @return Student
     */
    public function addRole(\Iirt\UserBundle\Entity\Role $roles)
    {
        $this->roles[] = $roles;

        return $this;
    }

    /**
     * Remove roles
     *
     * @param \Iirt\UserBundle\Entity\Role $roles
     */
    public function removeRole(\Iirt\UserBundle\Entity\Role $roles)
    {
        $this->roles->removeElement($roles);
    }

    /**
     * Get roles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set cycle
     *
     * @param \Iirt\UserBundle\Entity\Cycle $cycle
     * @return Student
     */
    public function setCycle(\Iirt\UserBundle\Entity\Cycle $cycle)
    {
        $this->cycle = $cycle;

        return $this;
    }

    /**
     * Get cycle
     *
     * @return \Iirt\UserBundle\Entity\Cycle 
     */
    public function getCycle()
    {
        return $this->cycle;
    }

    /**
     * Set path
     *
     * @param \Iirt\UserBundle\Entity\Path $path
     * @return Student
     */
    public function setPath(\Iirt\UserBundle\Entity\Path $path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return \Iirt\UserBundle\Entity\Path 
     */
    public function getPath()
    {
        return $this->path;
    }
}
