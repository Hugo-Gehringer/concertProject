<?php

namespace App\DataFixtures;

use App\Entity\Hall;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;


class HallFixtures extends Fixture implements DependentFixtureInterface


{


    public function load(ObjectManager $manager)
    {
        $h1 = new Hall();
        $h1->setName('Hall1')
            ->setCapacity(100)
            ->addShow($this->getReference(ConcertFixtures::Hall_1_1))
            ->addShow($this->getReference(ConcertFixtures::Hall_1_2))
            ->setAvailable(1);

        $h2 = new Hall();
        $h2->setName('Hall2')
            ->setCapacity(1000)
            ->addShow($this->getReference(ConcertFixtures::Hall_2_1))
            ->addShow($this->getReference(ConcertFixtures::Hall_2_2))
            ->addShow($this->getReference(ConcertFixtures::Hall_2_3))
            ->setAvailable(1);


        $manager->persist($h1);
        $manager->persist($h2);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ConcertFixtures::class,
        );
    }
}

