<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Comic;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadComicData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $manager) {
    $comic1 = new Comic();
    $comic1->setIssueNumber(1);
    $comic1->setTitle('Uncanny X-men 1');
    $comic1->setDescription('-');
    $comic1->setCover('-');
    $comic1->setSeries($this->getReference('series-xmen'));
    $comic1->setVolume(1);
    $manager->persist($comic1);

    $manager->flush();
  }

  public function getOrder()
  {
    return 5;
  }
}