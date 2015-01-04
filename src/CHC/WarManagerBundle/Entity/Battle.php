<?php

namespace CHC\WarManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Battle
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CHC\WarManagerBundle\Entity\BattleRepository")
 */
class Battle
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
     * @var integer
     *
     * @ORM\Column(name="enemy_village_position", type="integer")
     */
    private $enemyVillagePosition;
    
    /**
     * @ORM\ManyToOne(targetEntity="Village", inversedBy="battles") 
     */
    private $clanVillage;

    /**
     * @var integer
     *
     * @ORM\Column(name="score", type="integer")
     */
    private $score;
    
    /**
     * @ORM\ManyToOne(targetEntity="War", inversedBy="battles") 
     */
    private $war;
    
    


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
     * Set enemyId
     *
     * @param integer $enemyId
     * @return Battle
     */
    public function setEnemyVillagePosition($enemyVillagePosition)
    {
        $this->enemyVillagePosition = $enemyVillagePosition;

        return $this;
    }

    /**
     * Get enemyId
     *
     * @return integer 
     */
    public function getEnemyVillagePosition()
    {
        return $this->enemyVillagePosition;
    }

    /**
     * Set score
     *
     * @param integer $score
     * @return Battle
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer 
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set war
     *
     * @param \CHC\WarManagerBundle\Entity\War $war
     * @return Battle
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
     * @return Battle
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
