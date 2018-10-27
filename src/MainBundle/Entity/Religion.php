<?php

namespace MainBundle\Entity;

/**
 * Religion
 */
class Religion
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
     * @return Religion
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
     * @var \MainBundle\Entity\People
     */
    private $people;


    /**
     * Set people
     *
     * @param \MainBundle\Entity\People $people
     *
     * @return Religion
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
}
