<?php

namespace MainBundle\Entity;

/**
 * CityPopulation
 */
class CityPopulation
{
    /**
     * @var integer
     */
    private $population;

    /**
     * @var \MainBundle\Entity\City
     */
    private $city;

    /**
     * @var \MainBundle\Entity\People
     */
    private $people;


    /**
     * Set population
     *
     * @param integer $population
     *
     * @return CityPopulation
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
     * Set city
     *
     * @param \MainBundle\Entity\City $city
     *
     * @return CityPopulation
     */
    public function setCity(\MainBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \MainBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set people
     *
     * @param \MainBundle\Entity\People $people
     *
     * @return CityPopulation
     */
    public function setPeople(\MainBundle\Entity\People $people = null)
    {
        $this->people = $people;

        return $this;
    }

    /**
     * Get people
     *
     * @return \MainBundle\Entity\People
     */
    public function getPeople()
    {
        return $this->people;
    }
    /**
     * @var integer
     */
    private $id;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
