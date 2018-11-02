<?php

namespace MainBundle\Entity;

/**
 * Region
 */
class Region
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
    private $city;

    /**
     * @var \MainBundle\Entity\Planet
     */
    private $planet;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->city = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Region
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
     * Add city
     *
     * @param \MainBundle\Entity\City $city
     *
     * @return Region
     */
    public function addCity(\MainBundle\Entity\City $city)
    {
        $this->city[] = $city;

        return $this;
    }

    /**
     * Remove city
     *
     * @param \MainBundle\Entity\City $city
     */
    public function removeCity(\MainBundle\Entity\City $city)
    {
        $this->city->removeElement($city);
    }

    /**
     * Get city
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set planet
     *
     * @param \MainBundle\Entity\Planet $planet
     *
     * @return Region
     */
    public function setPlanet(\MainBundle\Entity\Planet $planet = null)
    {
        $this->planet = $planet;

        return $this;
    }

    /**
     * Get planet
     *
     * @return \MainBundle\Entity\Planet
     */
    public function getPlanet()
    {
        return $this->planet;
    }
    /**
     * @var array
     */
    private $seed;


    /**
     * Set seed
     *
     * @param array $seed
     *
     * @return Region
     */
    public function setSeed($seed)
    {
        $this->seed = $seed;

        return $this;
    }

    /**
     * Get seed
     *
     * @return array
     */
    public function getSeed()
    {
        return $this->seed;
    }
}
