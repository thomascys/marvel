<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Publisher
 *
 * @ORM\Entity
 * @ORM\Table(name="publisher")
 */
class Publisher
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $logo;

    /**
     * @ORM\OneToMany(targetEntity="Series", mappedBy="publisher")
     */
    protected $series;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->series = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Publisher
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
     * Set logo
     *
     * @param string $logo
     *
     * @return Publisher
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Add series
     *
     * @param \AppBundle\Entity\Series $series
     *
     * @return Publisher
     */
    public function addSeries(Series $series)
    {
        $this->series[] = $series;

        return $this;
    }

    /**
     * Remove series
     *
     * @param \AppBundle\Entity\Series $series
     */
    public function removeSeries(Series $series)
    {
        $this->series->removeElement($series);
    }

    /**
     * Get series
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->getName();
    }
}
