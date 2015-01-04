<?php

namespace CHC\WarManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clan
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CHC\WarManagerBundle\Entity\ClanRepository")
 */
class Clan
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
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @ORM\OneToMany(targetEntity="Village", mappedBy="clan", cascade={"persist", "persist"}) 
     */
    private $villages;
    
    /**
     * @ORM\OneToMany(targetEntity="War", mappedBy="clan", cascade={"persist", "persist"}) 
     */
    private $wars_as_self;
    
    /**
     * @ORM\OneToMany(targetEntity="War", mappedBy="enemyClan", cascade={"persist", "persist"}) 
     */
    private $wars_as_enemy;


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
     * Set code
     *
     * @param string $code
     * @return Clan
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Clan
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
     * Constructor
     */
    public function __construct()
    {
        $this->villages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->wars_as_self = new \Doctrine\Common\Collections\ArrayCollection();
        $this->wars_as_enemy = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add villages
     *
     * @param \CHC\WarManagerBundle\Entity\Village $villages
     * @return Clan
     */
    public function addVillage(\CHC\WarManagerBundle\Entity\Village $villages)
    {
        $this->villages[] = $villages;

        return $this;
    }

    /**
     * Remove villages
     *
     * @param \CHC\WarManagerBundle\Entity\Village $villages
     */
    public function removeVillage(\CHC\WarManagerBundle\Entity\Village $villages)
    {
        $this->villages->removeElement($villages);
    }

    /**
     * Get villages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVillages()
    {
        return $this->villages;
    }

    /**
     * Add wars_as_self
     *
     * @param \CHC\WarManagerBundle\Entity\War $warsAsSelf
     * @return Clan
     */
    public function addWarsAsSelf(\CHC\WarManagerBundle\Entity\War $warsAsSelf)
    {
        $this->wars_as_self[] = $warsAsSelf;

        return $this;
    }

    /**
     * Remove wars_as_self
     *
     * @param \CHC\WarManagerBundle\Entity\War $warsAsSelf
     */
    public function removeWarsAsSelf(\CHC\WarManagerBundle\Entity\War $warsAsSelf)
    {
        $this->wars_as_self->removeElement($warsAsSelf);
    }

    /**
     * Get wars_as_self
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWarsAsSelf()
    {
        return $this->wars_as_self;
    }

    /**
     * Add wars_as_enemy
     *
     * @param \CHC\WarManagerBundle\Entity\War $warsAsEnemy
     * @return Clan
     */
    public function addWarsAsEnemy(\CHC\WarManagerBundle\Entity\War $warsAsEnemy)
    {
        $this->wars_as_enemy[] = $warsAsEnemy;

        return $this;
    }

    /**
     * Remove wars_as_enemy
     *
     * @param \CHC\WarManagerBundle\Entity\War $warsAsEnemy
     */
    public function removeWarsAsEnemy(\CHC\WarManagerBundle\Entity\War $warsAsEnemy)
    {
        $this->wars_as_enemy->removeElement($warsAsEnemy);
    }

    /**
     * Get wars_as_enemy
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWarsAsEnemy()
    {
        return $this->wars_as_enemy;
    }
}
