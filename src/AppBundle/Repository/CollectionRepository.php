<?php

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class CollectionRepository extends EntityRepository
{
  public function findByUser($userId)
  {
    return $this->getEntityManager()
      ->createQuery('
        SELECT a
        FROM AppBundle:Collection a
        WHERE a.user_id = :user_id
      ')
      ->setParameter(':user_id', $userId);
  }
}