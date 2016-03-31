<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comic
 *
 * @ORM\Entity
 * @ORM\Table(name="comic")
 */
class Comic
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
     * @ORM\Column(type="integer")
     */
    protected $issueNumber;
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $title;
    /**
     * @ORM\Column(type="text")
     */
    protected $description;
    /**
     * @ORM\ManytoOne(targetEntity="Series", inversedBy="comics")
     */
    protected $series;
    /**
     * @ORM\Column(type="integer")
     */
    protected $volume;
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $cover;

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
     * Set issueNumber
     *
     * @param integer $issueNumber
     *
     * @return Comic
     */
    public function setIssueNumber($issueNumber)
    {
        $this->issueNumber = $issueNumber;

        return $this;
    }

    /**
     * Get issueNumber
     *
     * @return integer
     */
    public function getIssueNumber()
    {
        return $this->issueNumber;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Comic
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Comic
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set volume
     *
     * @param integer $volume
     *
     * @return Comic
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * Get volume
     *
     * @return integer
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Set cover
     *
     * @param string $cover
     *
     * @return Comic
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return string
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set series
     *
     * @param \AppBundle\Entity\Series $series
     *
     * @return Comic
     */
    public function setSeries(Series $series = null)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Get series
     *
     * @return \AppBundle\Entity\Series
     */
    public function getSeries()
    {
        return $this->series;
    }
    
}
