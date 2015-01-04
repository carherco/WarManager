<?php

namespace CHC\WarManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CHC\WarManagerBundle\Entity\CommentRepository")
 */
class Comment
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
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;
    
    /**
     * @ORM\ManyToOne(targetEntity="War", inversedBy="comments") 
     */
    private $war;
    
    /**
     * @ORM\ManyToOne(targetEntity="Village", inversedBy="comments") 
     */
    private $clanVillage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime")
     */
    private $time;


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
     * Set comment
     *
     * @param string $comment
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     * @return Comment
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set war
     *
     * @param \CHC\WarManagerBundle\Entity\War $war
     * @return Comment
     */
    public function setWar(\CHC\WarManagerBundle\Entity\War $war = null)
    {
        $this->war = $war;

        return $this;
    }

    /**
     * Get war
     *
     * @return \CHC\WarManagerBundle\Entity\War 
     */
    public function getWar()
    {
        return $this->war;
    }

    /**
     * Set clanVillage
     *
     * @param \CHC\WarManagerBundle\Entity\Village $clanVillage
     * @return Comment
     */
    public function setClanVillage(\CHC\WarManagerBundle\Entity\Village $clanVillage = null)
    {
        $this->clanVillage = $clanVillage;

        return $this;
    }

    /**
     * Get clanVillage
     *
     * @return \CHC\WarManagerBundle\Entity\Village 
     */
    public function getClanVillage()
    {
        return $this->clanVillage;
    }
}
