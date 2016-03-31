<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData extends AbstractFixture implements FixtureInterface
{
  public function load(ObjectManager $manager)
  {
    $admin = new User();
    $admin->setUsername('admin');
    $admin->setPassword('$2a$08$jHZj/wJfcVKlIwr5AvR78euJxYK7Ku5kURNhNx.7.CSIJ3Pq6LEPC'); // admin
    $admin->setEmail('admin@example.com');
    $admin->setIsActive(true);

    $manager->persist($admin);
    $manager->flush();
  }

  public function getOrder()
  {
    return 1;
  }
}