<?php

namespace MainBundle\Entity;

/**
 * Parameters
 */
class Parameters
{
    /**
     * @var boolean
     */
    private $tutorial;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \MainBundle\Entity\User
     */
    private $user;


    /**
     * Set tutorial
     *
     * @param boolean $tutorial
     *
     * @return Parameters
     */
    public function setTutorial($tutorial)
    {
        $this->tutorial = $tutorial;

        return $this;
    }

    /**
     * Get tutorial
     *
     * @return boolean
     */
    public function getTutorial()
    {
        return $this->tutorial;
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
     * Set user
     *
     * @param \MainBundle\Entity\User $user
     *
     * @return Parameters
     */
    public function setUser(\MainBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \MainBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @var boolean
     */
    private $first_time;


    /**
     * Set firstTime
     *
     * @param boolean $firstTime
     *
     * @return Parameters
     */
    public function setFirstTime($firstTime)
    {
        $this->first_time = $firstTime;

        return $this;
    }

    /**
     * Get firstTime
     *
     * @return boolean
     */
    public function getFirstTime()
    {
        return $this->first_time;
    }
}
