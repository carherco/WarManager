<?php

namespace CHC\WarManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CHC\WarManagerBundle\Entity\ReservationRepository")
 */
class Reservation
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
     * @ORM\ManyToOne(targetEntity="War", inversedBy="reservations") 
     */
    private $war;
    
    /**
     * @ORM\ManyToOne(targetEntity="Village", inversedBy="reservations") 
     */
    private $clanVillage;


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
