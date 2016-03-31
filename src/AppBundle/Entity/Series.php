<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Series
 *
 * @ORM\Entity
 * @ORM\Table(name="series")
 */
class Series
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
    protected $title;
    /**
     * @ORM\ManyToOne(targetEntity="Publisher", inversedBy="series")
     */
    protected $publisher;
    /**
     * @ORM\OneToMany(targetEntity="Comic", mappedBy="series")
     */
    protected $comics;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comics = new ArrayCollection();
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
     * Set title
     *
     * @param string $title
     *
     * @return Series
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
     * Set publisher
     *
     * @param \AppBundle\Entity\Publisher $publisher
     *
     * @return Series
     */
    public function setPublisher(Publisher $publisher = null)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher
     *
     * @return \AppBundle\Entity\Publisher
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Add comic
     *
     * @param \AppBundle\Entity\Comic $comic
     *
     * @return Series
     */
    public function addComic(Comic $comic)
    {
        $this->comics[] = $comic;

        return $this;
    }

    /**
     * Remove comic
     *
     * @param \AppBundle\Entity\Comic $comic
     */
    public function removeComic(Comic $comic)
    {
        $this->comics->removeElement($comic);
    }

    /**
     * Get comics
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComics()
    {
        return $this->comics;
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->getTitle();
    }
}
