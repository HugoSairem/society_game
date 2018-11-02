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
    /**
     * @var string
     */
    private $name;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Person
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
     * @var string
     */
    private $firstname;

    /**
     * @var tinyint
     */
    private $sexe;


    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Person
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set sexe
     *
     * @param \tinyint $sexe
     *
     * @return Person
     */
    public function setSexe(\tinyint $sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return \tinyint
     */
    public function getSexe()
    {
        return $this->sexe;
    }
    /**
     * @var integer
     */
    private $age;

    /**
     * @var integer
     */
    private $gender;


    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Person
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set gender
     *
     * @param integer $gender
     *
     * @return Person
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return integer
     */
    public function getGender()
    {
        return $this->gender;
    }
    /**
     * @var \MainBundle\Entity\City
     */
    private $city;


    /**
     * Set city
     *
     * @param \MainBundle\Entity\City $city
     *
     * @return Person
     */
    public function setCity(\MainBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \MainBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }
}
