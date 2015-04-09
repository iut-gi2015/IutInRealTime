<?php

namespace Iirt\AnnouncementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Announcement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Iirt\AnnouncementBundle\Entity\AnnouncementRepository")
 * @ORM\Entity
 */
class Announcement
{
    /**
     * @ORM\OneToOne(targetEntity="Iirt\AnnouncementBundle\Entity\AnnouncementFile", cascade={"persist"})
     */
    private $announcement_file;
        
    /**
     * @ORM\ManyToOne(targetEntity="Iirt\UserBundle\Entity\Student", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
   private $student;


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
     * @return Announcement
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
     * @return Announcement
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
     * @return Announcement
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
     * Set announcement_file
     *
     * @param \Iirt\AnnouncementBundle\Entity\AnnouncementFile $announcementFile
     * @return Announcement
     */
    public function setAnnouncementFile(\Iirt\AnnouncementBundle\Entity\AnnouncementFile $announcementFile = null)
    {
        $this->announcement_file = $announcementFile;

        return $this;
    }

    /**
     * Get announcement_file
     *
     * @return \Iirt\AnnouncementBundle\Entity\AnnouncementFile 
     */
    public function getAnnouncementFile()
    {
        return $this->announcement_file;
    }

    /**
     * Set student
     *
     * @param \Iirt\UserBundle\Entity\Student $student
     * @return Announcement
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
