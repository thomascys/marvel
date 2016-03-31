<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comic
 *
 * @ORM\Entity
 * @ORM\Table(name="collection")
 */
class Collection {
  /**
   * @var int
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;
  /**
   * @ORM\Column(name="user_id", type="integer")
   */
  protected $user;
  /**
   * @ORM\Column(name="comic_id", type="integer")
   */
  protected $comic;
  /**
   * @ORM\Column(name="series_id", type="integer")
   */
  protected $series;
  /**
   * @ORM\Column(name="publisher_id", type="integer")
   */
  protected $publisher;

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
   * @param integer $user
   *
   * @return Collection
   */
  public function setUser($user)
  {
      $this->user = $user;

      return $this;
  }

  /**
   * Get user
   *
   * @return integer
   */
  public function getUser()
  {
      return $this->user;
  }

  /**
   * Set comic
   *
   * @param integer $comic
   *
   * @return Collection
   */
  public function setComic($comic)
  {
      $this->comic = $comic;

      return $this;
  }

  /**
   * Get comic
   *
   * @return integer
   */
  public function getComic()
  {
      return $this->comic;
  }

  /**
   * Set series
   *
   * @param integer $series
   *
   * @return Collection
   */
  public function setSeries($series)
  {
      $this->series = $series;

      return $this;
  }

  /**
   * Get series
   *
   * @return integer
   */
  public function getSeries()
  {
      return $this->series;
  }

  /**
   * Set publisher
   *
   * @param integer $publisher
   *
   * @return Collection
   */
  public function setPublisher($publisher)
  {
      $this->publisher = $publisher;

      return $this;
  }

  /**
   * Get publisher
   *
   * @return integer
   */
  public function getPublisher()
  {
      return $this->publisher;
  }
}
