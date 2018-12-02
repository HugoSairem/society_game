<?php

namespace MapBundle\Entity;

/**
 * Solar
 */
class Solar
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $planet;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->planet = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Solar
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add planet
     *
     * @param \MapBundle\Entity\Planet $planet
     *
     * @return Solar
     */
    public function addPlanet(\MapBundle\Entity\Planet $planet)
    {
        $this->planet[] = $planet;

        return $this;
    }

    /**
     * Remove planet
     *
     * @param \MapBundle\Entity\Planet $planet
     */
    public function removePlanet(\MapBundle\Entity\Planet $planet)
    {
        $this->planet->removeElement($planet);
    }

    /**
     * Get planet
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlanet()
    {
        return $this->planet;
    }
}
