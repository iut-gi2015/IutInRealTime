<?php

namespace Iirt\AnnouncementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Meeting
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Iirt\AnnouncementBundle\Entity\MeetingRepository")
 */
class Meeting
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
     * @ORM\Column(name="subject", type="text")
     */
    private $subject;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    public function __construct()
    {
        $this->date = new \Datetime(); 
    }
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateMeeting", type="datetime")
     */
    private $dateMeeting;

   
    /**
     * @ORM\ManyToOne(targetEntity="Iirt\UserBundle\Entity\Student", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $student;
   
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
     * Set subject
     *
     * @param string $subject
     * @return Meeting
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    
        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Meeting
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set dateMeeting
     *
     * @param \DateTime $dateMeeting
     * @return Meeting
     */
    public function setDateMeeting($dateMeeting)
    {
        $this->dateMeeting = $dateMeeting;
    
        return $this;
    }

    /**
     * Get dateMeeting
     *
     * @return \DateTime 
     */
    public function getDateMeeting()
    {
        return $this->dateMeeting;
    }
    
    /**
     * Set student
     *
     * @param \Iirt\UserBundle\Entity\Student $student
     * @return Meeting
     */
    public function setStudent(\Iirt\UserBundle\Entity\Student $student)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \Iirt\UserBundle\Entity\Student 
     */
    public function getStudent()
    {
        return $this->student;
    }

}
