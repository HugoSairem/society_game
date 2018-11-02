<?php

namespace MainBundle\Entity;

/**
 * Society
 */
class Society
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
     * @var \MainBundle\Entity\User
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $people;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->people = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Society
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
     * Set user
     *
     * @param \MainBundle\Entity\User $user
     *
     * @return Society
     */
    public function setUser(\MainBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \MainBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add person
     *
     * @param \MainBundle\Entity\People $person
     *
     * @return Society
     */
    public function addPerson(\MainBundle\Entity\People $person)
    {
        $this->people[] = $person;

        return $this;
    }

    /**
     * Remove person
     *
     * @param \MainBundle\Entity\People $person
     */
    public function removePerson(\MainBundle\Entity\People $person)
    {
        $this->people->removeElement($person);
    }

    /**
     * Get people
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPeople()
    {
        return $this->people;
    }
    /**
     * @var string
     */
    private $stage;


    /**
     * Set stage
     *
     * @param string $stage
     *
     * @return Society
     */
    public function setStage($stage)
    {
        $this->stage = $stage;

        return $this;
    }

    /**
     * Get stage
     *
     * @return string
     */
    public function getStage()
    {
        return $this->stage;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $planet;


    /**
     * Add planet
     *
     * @param \MainBundle\Entity\Planet $planet
     *
     * @return Society
     */
    public function addPlanet(\MainBundle\Entity\Planet $planet)
    {
        $this->planet[] = $planet;

        return $this;
    }

    /**
     * Remove planet
     *
     * @param \MainBundle\Entity\Planet $planet
     */
    public function removePlanet(\MainBundle\Entity\Planet $planet)
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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $city;


    /**
     * Add city
     *
     * @param \MainBundle\Entity\City $city
     *
     * @return Society
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
     * @var integer
     */
    private $population;


    /**
     * Set population
     *
     * @param integer $population
     *
     * @return Society
     */
    public function setPopulation($population)
    {
        $this->population = $population;

        return $this;
    }

    /**
     * Get population
     *
     * @return integer
     */
    public function getPopulation()
    {
        return $this->population;
    }
}
