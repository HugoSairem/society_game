<?php

namespace MainBundle\Entity;

/**
 * People
 */
class People
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
     * @var \MainBundle\Entity\Society
     */
    private $society;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return People
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
     * Set society
     *
     * @param \MainBundle\Entity\Society $society
     *
     * @return People
     */
    public function setSociety(\MainBundle\Entity\Society $society = null)
    {
        $this->society = $society;

        return $this;
    }

    /**
     * Get society
     *
     * @return \MainBundle\Entity\Society
     */
    public function getSociety()
    {
        return $this->society;
    }
    /**
     * @var \MainBundle\Entity\Race
     */
    private $race;


    /**
     * Set race
     *
     * @param \MainBundle\Entity\Race $race
     *
     * @return People
     */
    public function setRace(\MainBundle\Entity\Race $race = null)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return \MainBundle\Entity\Race
     */
    public function getRace()
    {
        return $this->race;
    }
    /**
     * @var \MainBundle\Entity\Person
     */
    private $person;


    /**
     * Set person
     *
     * @param \MainBundle\Entity\Person $person
     *
     * @return People
     */
    public function setPerson(\MainBundle\Entity\Person $person = null)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \MainBundle\Entity\Person
     */
    public function getPerson()
    {
        return $this->person;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->person = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add person
     *
     * @param \MainBundle\Entity\Person $person
     *
     * @return People
     */
    public function addPerson(\MainBundle\Entity\Person $person)
    {
        $this->person[] = $person;

        return $this;
    }

    /**
     * Remove person
     *
     * @param \MainBundle\Entity\Person $person
     */
    public function removePerson(\MainBundle\Entity\Person $person)
    {
        $this->person->removeElement($person);
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
     * @return People
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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $city_population;


    /**
     * Add cityPopulation
     *
     * @param \MainBundle\Entity\CityPoPulation $cityPopulation
     *
     * @return People
     */
    public function addCityPopulation(\MainBundle\Entity\CityPoPulation $cityPopulation)
    {
        $this->city_population[] = $cityPopulation;

        return $this;
    }

    /**
     * Remove cityPopulation
     *
     * @param \MainBundle\Entity\CityPoPulation $cityPopulation
     */
    public function removeCityPopulation(\MainBundle\Entity\CityPoPulation $cityPopulation)
    {
        $this->city_population->removeElement($cityPopulation);
    }

    /**
     * Get cityPopulation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCityPopulation()
    {
        return $this->city_population;
    }
}
