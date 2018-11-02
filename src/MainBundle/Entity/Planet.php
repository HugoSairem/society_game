<?php

namespace MainBundle\Entity;

/**
 * Planet
 */
class Planet
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \MainBundle\Entity\Solar
     */
    private $solar;


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
     * Set solar
     *
     * @param \MainBundle\Entity\Solar $solar
     *
     * @return Planet
     */
    public function setSolar(\MainBundle\Entity\Solar $solar = null)
    {
        $this->solar = $solar;

        return $this;
    }

    /**
     * Get solar
     *
     * @return \MainBundle\Entity\Solar
     */
    public function getSolar()
    {
        return $this->solar;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $society;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->society = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add society
     *
     * @param \MainBundle\Entity\Society $society
     *
     * @return Planet
     */
    public function addSociety(\MainBundle\Entity\Society $society)
    {
        $this->society[] = $society;

        return $this;
    }

    /**
     * Remove society
     *
     * @param \MainBundle\Entity\Society $society
     */
    public function removeSociety(\MainBundle\Entity\Society $society)
    {
        $this->society->removeElement($society);
    }

    /**
     * Get society
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSociety()
    {
        return $this->society;
    }
    /**
     * @var string
     */
    private $name;


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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $region;


    /**
     * Add region
     *
     * @param \MainBundle\Entity\Region $region
     *
     * @return Planet
     */
    public function addRegion(\MainBundle\Entity\Region $region)
    {
        $this->region[] = $region;

        return $this;
    }

    /**
     * Remove region
     *
     * @param \MainBundle\Entity\Region $region
     */
    public function removeRegion(\MainBundle\Entity\Region $region)
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
     * @var array
     */
    private $seed;


    /**
     * Set seed
     *
     * @param array $seed
     *
     * @return Planet
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
     * @var array
     */
    private $regionMapping;


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
     * Set id
     *
     * @param integer $id
     *
     * @return Planet
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
