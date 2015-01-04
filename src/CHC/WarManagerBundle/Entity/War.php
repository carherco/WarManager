<?php

namespace CHC\WarManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * War
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CHC\WarManagerBundle\Entity\WarRepository")
 */
class War
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
     * @ORM\ManyToOne(targetEntity="Clan", inversedBy="wars_as_self") 
     */
    private $clan;
    
    /**
     * @ORM\ManyToOne(targetEntity="Clan", inversedBy="wars_as_enemy") 
     */
    private $enemyClan;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="num_enemies", type="integer")
     */
    private $numEnemies;

    /**
     * @var integer
     *
     * @ORM\Column(name="clan_score", type="integer")
     */
    private $clanScore;

    /**
     * @var integer
     *
     * @ORM\Column(name="enemy_score", type="integer")
     */
    private $enemyScore;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="finished", type="boolean")
     */
    private $finished;
    
    /**
     * @ORM\OneToMany(targetEntity="Battle", mappedBy="war", cascade={"persist", "persist"}) 
     */
    private $battles;
    
    /**
     * @ORM\OneToMany(targetEntity="Reservation", mappedBy="war", cascade={"persist", "persist"}) 
     */
    private $reservations;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="war", cascade={"persist", "persist"}) 
     */
    private $comments;


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
     * Set clanScore
     *
     * @param integer $clanScore
     * @return War
     */
    public function setClanScore($clanScore)
    {
        $this->clanScore = $clanScore;

        return $this;
    }

    /**
     * Get clanScore
     *
     * @return integer 
     */
    public function getClanScore()
    {
        return $this->clanScore;
    }

    /**
     * Set enemyScore
     *
     * @param integer $enemyScore
     * @return War
     */
    public function setEnemyScore($enemyScore)
    {
        $this->enemyScore = $enemyScore;

        return $this;
    }

    /**
     * Get enemyScore
     *
     * @return integer 
     */
    public function getEnemyScore()
    {
        return $this->enemyScore;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->battles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add battles
     *
     * @param \CHC\WarManagerBundle\Entity\Battle $battles
     * @return War
     */
    public function addBattle(\CHC\WarManagerBundle\Entity\Battle $battles)
    {
        $this->battles[] = $battles;

        return $this;
    }

    /**
     * Remove battles
     *
     * @param \CHC\WarManagerBundle\Entity\Battle $battles
     */
    public function removeBattle(\CHC\WarManagerBundle\Entity\Battle $battles)
    {
        $this->battles->removeElement($battles);
    }

    /**
     * Get battles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBattles()
    {
        return $this->battles;
    }

    /**
     * Set enemyClan
     *
     * @param \CHC\WarManagerBundle\Entity\Clan $enemyClan
     * @return War
     */
    public function setEnemyClan(\CHC\WarManagerBundle\Entity\Clan $enemyClan = null)
    {
        $this->enemyClan = $enemyClan;

        return $this;
    }

    /**
     * Get enemyClan
     *
     * @return \CHC\WarManagerBundle\Entity\Clan 
     */
    public function getEnemyClan()
    {
        return $this->enemyClan;
    }

    /**
     * Set clan
     *
     * @param \CHC\WarManagerBundle\Entity\Clan $clan
     * @return War
     */
    public function setClan(\CHC\WarManagerBundle\Entity\Clan $clan = null)
    {
        $this->clan = $clan;

        return $this;
    }

    /**
     * Get clan
     *
     * @return \CHC\WarManagerBundle\Entity\Clan 
     */
    public function getClan()
    {
        return $this->clan;
    }

    /**
     * Add reservations
     *
     * @param \CHC\WarManagerBundle\Entity\Reservation $reservations
     * @return War
     */
    public function addReservation(\CHC\WarManagerBundle\Entity\Reservation $reservations)
    {
        $this->reservations[] = $reservations;

        return $this;
    }

    /**
     * Remove reservations
     *
     * @param \CHC\WarManagerBundle\Entity\Reservation $reservations
     */
    public function removeReservation(\CHC\WarManagerBundle\Entity\Reservation $reservations)
    {
        $this->reservations->removeElement($reservations);
    }

    /**
     * Get reservations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReservations()
    {
        return $this->reservations;
    }

    /**
     * Add comments
     *
     * @param \CHC\WarManagerBundle\Entity\Comment $comment
     * @return War
     */
    public function addComment(\CHC\WarManagerBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \CHC\WarManagerBundle\Entity\Comment $comment
     */
    public function removeComment(\CHC\WarManagerBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set numEnemies
     *
     * @param integer $numEnemies
     * @return War
     */
    public function setNumEnemies($numEnemies)
    {
        $this->numEnemies = $numEnemies;

        return $this;
    }

    /**
     * Get numEnemies
     *
     * @return integer 
     */
    public function getNumEnemies()
    {
        return $this->numEnemies;
    }

    /**
     * Set finished
     *
     * @param boolean $finished
     * @return War
     */
    public function setFinished($finished)
    {
        $this->finished = $finished;

        return $this;
    }

    /**
     * Get finished
     *
     * @return boolean 
     */
    public function getFinished()
    {
        return $this->finished;
    }
}
