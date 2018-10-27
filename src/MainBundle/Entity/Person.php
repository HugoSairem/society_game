<?php

namespace MainBundle\Entity;

/**
 * Person
 */
class Person
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \MainBundle\Entity\People
     */
    private $people;


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
     * Set people
     *
     * @param \MainBundle\Entity\People $people
     *
     * @return Person
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
