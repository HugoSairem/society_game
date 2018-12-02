<?php

namespace MapBundle\Entity;

/**
 * Planet
 */
class Planet
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $precipitation;

    /**
     * @var string
     */
    private $temperature;

    /**
     * @var string
     */
    private $toxicity;

    /**
     * @var string
     */
    private $atmosphere;

    /**
     * @var array
     */
    private $regionMapping;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $region;

    /**
     * @var \MapBundle\Entity\Solar
     */
    private $solar;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->region = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Planet
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
     * Set precipitation
     *
     * @param string $precipitation
     *
     * @return Planet
     */
    public function setPrecipitation($precipitation)
    {
        $this->precipitation = $precipitation;

        return $this;
    }

    /**
     * Get precipitation
     *
     * @return string
     */
    public function getPrecipitation()
    {
        return $this->precipitation;
    }

    /**
     * Set temperature
     *
     * @param string $temperature
     *
     * @return Planet
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;

        return $this;
    }

    /**
     * Get temperature
     *
     * @return string
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * Set toxicity
     *
     * @param string $toxicity
     *
     * @return Planet
     */
    public function setToxicity($toxicity)
    {
        $this->toxicity = $toxicity;

        return $this;
    }

    /**
     * Get toxicity
     *
     * @return string
     */
    public function getToxicity()
    {
        return $this->toxicity;
    }

    /**
     * Set atmosphere
     *
     * @param string $atmosphere
     *
     * @return Planet
     */
    public function setAtmosphere($atmosphere)
    {
        $this->atmosphere = $atmosphere;

        return $this;
    }

    /**
     * Get atmosphere
     *
     * @return string
     */
    public function getAtmosphere()
    {
        return $this->atmosphere;
    }

    /**
     * Set regionMapping
     *
     * @param array $regionMapping
     *
     * @return Planet
     */
    public function setRegionMapping($regionMapping)
    {
        $this->regionMapping = $regionMapping;

        return $this;
    }

    /**
     * Get regionMapping
     *
     * @return array
     */
    public function getRegionMapping()
    {
        return $this->regionMapping;
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
     * Add region
     *
     * @param \MapBundle\Entity\Region $region
     *
     * @return Planet
     */
    public function addRegion(\MapBundle\Entity\Region $region)
    {
        $this->region[] = $region;

        return $this;
    }

    /**
     * Remove region
     *
     * @param \MapBundle\Entity\Region $region
     */
    public function removeRegion(\MapBundle\Entity\Region $region)
    {
        $this->region->removeElement($region);
    }

    /**
     * Get region
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set solar
     *
     * @param \MapBundle\Entity\Solar $solar
     *
     * @return Planet
     */
    public function setSolar(\MapBundle\Entity\Solar $solar = null)
    {
        $this->solar = $solar;

        return $this;
    }

    /**
     * Get solar
     *
     * @return \MapBundle\Entity\Solar
     */
    public function getSolar()
    {
        return $this->solar;
    }
}
