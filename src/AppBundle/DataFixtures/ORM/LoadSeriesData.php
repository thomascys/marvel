<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Series;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadSeriesData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $manager)
  {
    $uncannyXmen = new Series();
    $uncannyXmen->setTitle('Uncanny X-men');
    $uncannyXmen->setPublisher($this->getReference('publisher-marvel'));
    $manager->persist($uncannyXmen);

    $jla = new Series();
    $jla->setTitle('Justice League of America');
    $jla->setPublisher($this->getReference('publisher-dc'));
    $manager->persist($jla);

    $manager->flush();

    $this->addReference('series-xmen', $uncannyXmen);
    $this->addReference('series-jla', $jla);
  }

  public function getOrder()
  {
    return 3;
  }
}