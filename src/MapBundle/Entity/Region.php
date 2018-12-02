<?php

namespace MapBundle\Entity;

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
     * @var array
     */
    private $seed;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \MapBundle\Entity\Planet
     */
    private $planet;


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
     * Set planet
     *
     * @param \MapBundle\Entity\Planet $planet
     *
     * @return Region
     */
    public function setPlanet(\MapBundle\Entity\Planet $planet = null)
    {
        $this->planet = $planet;

        return $this;
    }

    /**
     * Get planet
     *
     * @return \MapBundle\Entity\Planet
     */
    public function getPlanet()
    {
        return $this->planet;
    }
}
