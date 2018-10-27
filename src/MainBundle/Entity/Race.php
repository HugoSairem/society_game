<?php

namespace MainBundle\Entity;

/**
 * Race
 */
class Race
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
     * @var \MainBundle\Entity\People
     */
    private $people;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Race
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
     * Set people
     *
     * @param \MainBundle\Entity\People $people
     *
     * @return Race
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
