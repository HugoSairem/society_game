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
}
