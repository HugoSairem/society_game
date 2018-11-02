<?php

namespace MainBundle\Entity;

/**
 * City
 */
class City
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
     * @var \MainBundle\Entity\Region
     */
    private $region;

    /**
     * @var \MainBundle\Entity\Society
     */
    private $society;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return City
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
     * Set region
     *
     * @param \MainBundle\Entity\Region $region
     *
     * @return City
     */
    public function setRegion(\MainBundle\Entity\Region $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \MainBundle\Entity\Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set society
     *
     * @param \MainBundle\Entity\Society $society
     *
     * @return City
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
     * @var integer
     */
    private $population;


    /**
     * Set population
     *
     * @param integer $population
     *
     * @return City
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
    private $person;

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
     * @return City
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
     * Get person
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPerson()
    {
        return $this->person;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $city_population;


    /**
     * Add cityPopulation
     *
     * @param \MainBundle\Entity\CityPopulation $cityPopulation
     *
     * @return City
     */
    public function addCityPopulation(\MainBundle\Entity\CityPopulation $cityPopulation)
    {
        $this->city_population[] = $cityPopulation;

        return $this;
    }

    /**
     * Remove cityPopulation
     *
     * @param \MainBundle\Entity\CityPopulation $cityPopulation
     */
    public function removeCityPopulation(\MainBundle\Entity\CityPopulation $cityPopulation)
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
