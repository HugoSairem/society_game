<?php

namespace MainBundle\Entity;

/**
 * Technology
 */
class Technology
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \MainBundle\Entity\Society
     */
    private $society;


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
     * @return Technology
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
