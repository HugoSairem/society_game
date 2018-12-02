<?php

namespace MapBundle\Entity;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
