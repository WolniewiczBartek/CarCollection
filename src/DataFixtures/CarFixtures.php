<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Car;

class CarFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $car1 = new Car();
        $car1->setBrand('Ford');
        $car1->setModel('Mondeo MK5');
        $car1->setProductionYear(2015);
        $car1->setHorsePower(200);
        $car1->setImagePath('https://cdn.pixabay.com/photo/2018/04/14/10/42/car-3318727_960_720.jpg');

        $manager->persist($car1);


        $car2 = new Car();
        $car2->setBrand('Mazda');
        $car2->setModel('CX5');
        $car2->setProductionYear(2010);
        $car2->setHorsePower(150);
        $car2->setImagePath('https://cdn.pixabay.com/photo/2022/04/01/10/05/traffic-7104467_960_720.jpg');

        $manager->persist($car2);
        $manager->flush();
    }
}

?>