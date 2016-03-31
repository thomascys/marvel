<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Publisher;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPublisherData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $manager)
  {
    $marvel = new Publisher();
    $marvel->setName('Marvel');
    $marvel->setLogo('-');
    $manager->persist($marvel);

    $dc = new Publisher();
    $dc->setName('DC');
    $dc->setLogo('-');
    $manager->persist($dc);
    
    $manager->flush();

    $this->addReference('publisher-marvel', $marvel);
    $this->addReference('publisher-dc', $dc);
  }
  public function getOrder()
  {
    return 2;
  }
}