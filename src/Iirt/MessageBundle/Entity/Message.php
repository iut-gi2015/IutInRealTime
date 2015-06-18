<?php

namespace Iirt\MessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Iirt\MessageBundle\Entity\MessageRepository")
 * @ORM\Entity
 */
class Message
{
    /*
     * @ORM\OneToOne(targetEntity="Iirt\MessageBundle\Entity\MessageFile", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     *
    private $message_file;*/
    
    /**
     * @ORM\ManyToOne(targetEntity="Iirt\UserBundle\Entity\Student", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
   private $student;
   
   /**
    * @ORM\ManyToOne(targetEntity="Iirt\UserBundle\Entity\Teacher", cascade={"persist"})
    * @ORM\JoinColumn(nullable=false)
    */
   private $teacher;


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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    
    /**
     * @var \Boolean
     *
     * @ORM\Column(name="read_or_no", type="boolean")
     */
    private $read_or_no;
    
    public function __construct()
    {
        $this->date = new \DateTime;
    }

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
     * Set title
     *
     * @param string $title
     * @return Message
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Message
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
     * Set date
     *
     * @param \DateTime $date
     * @return Message
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
     * Set read_or_no
     *
     * @param boolean $readOrNo
     * @return Message
     */
    public function setReadOrNo($readOrNo)
    {
        $this->read_or_no = $readOrNo;

        return $this;
    }

    /**
     * Get read_or_no
     *
     * @return boolean 
     */
    public function getReadOrNo()
    {
        return $this->read_or_no;
    }

    /*
     * Set message_file
     *
     * @param \Iirt\MessageBundle\Entity\MessageFile $messageFile
     * @return Message
    
    public function setMessageFile(\Iirt\MessageBundle\Entity\MessageFile $messageFile = null)
    {
        $this->message_file = $messageFile;

        return $this;
    }
 */
    /*
     * Get message_file
     *
     * @return \Iirt\MessageBundle\Entity\MessageFile 
     
    public function getMessageFile()
    {
        return $this->message_file;
    }*/

    /**
     * Set student
     *
     * @param \Iirt\UserBundle\Entity\Student $student
     * @return Message
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

    /**
     * Set teacher
     *
     * @param \Iirt\UserBundle\Entity\Teacher $teacher
     * @return Message
     */
    public function setTeacher(\Iirt\UserBundle\Entity\Teacher $teacher)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher
     *
     * @return \Iirt\UserBundle\Entity\Teacher 
     */
    public function getTeacher()
    {
        return $this->teacher;
    }
}
