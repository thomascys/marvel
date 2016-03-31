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
    $comic1->setTitle('X-men');
    $comic1->setDescription('first issue');
    $comic1->setCover('http://static6.comicvine.com/uploads/scale_large/0/5344/1355017-uxm_v1_001_01.jpg');
    $comic1->setSeries($this->getReference('series-xmen'));
    $comic1->setVolume(1);
    $manager->persist($comic1);

    $comic2 = new Comic();
    $comic2->setIssueNumber(2);
    $comic2->setTitle('No One Can Stop the Vanisher');
    $comic2->setDescription('second issue');
    $comic2->setCover('http://static5.comicvine.com/uploads/scale_large/0/5344/1355032-01.jpg');
    $comic2->setSeries($this->getReference('series-xmen'));
    $comic2->setVolume(1);
    $manager->persist($comic2);

    $comic3 = new Comic();
    $comic3->setIssueNumber(3);
    $comic3->setTitle('Beware the Blob');
    $comic3->setDescription('third issue');
    $comic3->setCover('http://static9.comicvine.com/uploads/scale_large/0/5344/1355038-01.jpg');
    $comic3->setSeries($this->getReference('series-xmen'));
    $comic3->setVolume(1);
    $manager->persist($comic3);

    $manager->flush();
  }

  public function getOrder()
  {
    return 5;
  }
}