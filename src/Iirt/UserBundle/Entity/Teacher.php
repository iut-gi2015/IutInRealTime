<?php

namespace Iirt\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Teacher
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Iirt\UserBundle\Entity\TeacherRepository")
 */
class Teacher
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
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="department", type="string", length=255)
     *
     */
    private $department;

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
     * @return Teacher
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
     * @return Teacher
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
     * @return Teacher
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
     * Set password
     *
     * @param string $password
     * @return Teacher
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
     * Set department
     *
     * @param string $department
     * @return Teacher
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return string 
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Teacher
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
     * @return Teacher
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
     * Set connected
     *
     * @param boolean $connected
     * @return Teacher
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
}
