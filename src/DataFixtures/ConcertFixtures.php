<?php

namespace App\DataFixtures;

use App\Entity\Concert;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ConcertFixtures extends Fixture implements DependentFixtureInterface


{
    public const show_1_1_KORN = 'a11';
    public const show_1_2_KORN = 'a12';
    public const show_2_1_KORN = 'a21';
    public const show_2_2_KORN = 'a22';
    public const show_2_3_KORN = 'a23';
    public function load(ObjectManager $manager)
    {
        $c1 = new Concert();
        $c1->setDate(2021-01-28);

        $c2 = new Concert();
        $c2->setDate(2020-12-15);

        $c3 = new Concert();
        $c3->setDate(2021-04-9);

        $c4 = new Concert();
        $c4->setDate(2020-12-14);

        $c5 = new Concert();
        $c5->setDate(2021-8-20);




        $manager->persist($c1);

        $manager->flush();

        $this->addReference(self::show_1_1_KORN, $c1);
        $this->addReference(self::show_1_2_KORN, $c2);
        $this->addReference(self::show_2_1_KORN, $c3);
        $this->addReference(self::show_2_2_KORN, $c4);
        $this->addReference(self::show_2_3_KORN, $c5);

    }

    public function getDependencies()
    {
        return array(

            BandFixtures::class
        );
    }
}

