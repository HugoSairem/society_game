<?php

namespace MainBundle\Entity;

/**
 * Area
 */
class Area
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var boolean
     */
    private $crossable;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set type
     *
     * @param string $type
     *
     * @return Area
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set crossable
     *
     * @param boolean $crossable
     *
     * @return Area
     */
    public function setCrossable($crossable)
    {
        $this->crossable = $crossable;

        return $this;
    }

    /**
     * Get crossable
     *
     * @return boolean
     */
    public function getCrossable()
    {
        return $this->crossable;
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
}
