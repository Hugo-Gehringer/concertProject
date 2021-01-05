<?php

namespace App\DataFixtures;

use App\Entity\ConcertHall;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use phpDocumentor\Reflection\Types\This;

class ConcertHallFixtures extends Fixture implements DependentFixtureInterface


{

    public function load(ObjectManager $manager)
    {
        $ch1 = new ConcertHall();
        $ch1->setName('HallDeConcert1')
            ->setCity("99 Avenue d'Occitanie, 34090 Montpellier")
            ->addHall($this->getReference(HallFixtures::Hall1))
            ->addHall($this->getReference(HallFixtures::Hall2));
        $manager->persist($ch1);

        $manager->flush();



    }

    public function getDependencies()
    {
        return array(
            HallFixtures::class,
        );
    }
}

