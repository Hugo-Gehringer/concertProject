<?php

namespace App\DataFixtures;

use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Band;

class BandFixtures extends Fixture implements DependentFixtureInterface


{


    public function load(ObjectManager $manager)
    {
        $b1 = new Band();
        $b1->setName('Korn')
            ->setStyle('Metal')
            ->setYearOfCreation(new DateTime(1993))
            ->setLastAlbumName('The Nothing')
            ->addShow($this->getReference(ConcertFixtures::Hall_1_1))
            ->addShow($this->getReference(ConcertFixtures::Hall_1_2))
            ->addShow($this->getReference(ConcertFixtures::Hall_2_1))
            ->addShow($this->getReference(ConcertFixtures::Hall_2_2))
            ->addShow($this->getReference(ConcertFixtures::Hall_2_3))

            ->addMember($this->getReference(MemberFixtures::KORN_1))
            ->addMember($this->getReference(MemberFixtures::KORN_2))
            ->addMember($this->getReference(MemberFixtures::KORN_3))
            ->addMember($this->getReference(MemberFixtures::KORN_4))
            ->addMember($this->getReference(MemberFixtures::KORN_5))
            ->addShow()
        ;

        $manager->persist($b1);

        $manager->flush();



    }

    public function getDependencies()
    {
        return array(
            MemberFixtures::class,
            ConcertFixtures::class,
        );
    }
}

