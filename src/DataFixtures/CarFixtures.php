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
        $car1->setDescription('This is Ford Mondeo MK5 description.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at quam lacus. Cras fermentum quam id nunc hendrerit, id accumsan ligula semper. Ut finibus eget urna eget commodo. Sed dolor elit, sollicitudin vitae dapibus egestas, rhoncus quis felis. Praesent lorem lectus, commodo sed efficitur sit amet, mollis et est. Vestibulum bibendum, nisi et laoreet dictum, est diam rutrum mauris, non laoreet metus urna a magna. Etiam consectetur dolor diam, rutrum euismod urna molestie id. Donec in metus.');

        $manager->persist($car1);


        $car2 = new Car();
        $car2->setBrand('Mazda');
        $car2->setModel('CX5');
        $car2->setProductionYear(2010);
        $car2->setHorsePower(150);
        $car2->setImagePath('https://cdn.pixabay.com/photo/2022/04/01/10/05/traffic-7104467_960_720.jpg');
        $car1->setDescription('This is Mazda CX5 description.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at quam lacus. Cras fermentum quam id nunc hendrerit, id accumsan ligula semper. Ut finibus eget urna eget commodo. Sed dolor elit, sollicitudin vitae dapibus egestas, rhoncus quis felis. Praesent lorem lectus, commodo sed efficitur sit amet, mollis et est. Vestibulum bibendum, nisi et laoreet dictum, est diam rutrum mauris, non laoreet metus urna a magna. Etiam consectetur dolor diam, rutrum euismod urna molestie id. Donec in metus.');


        $manager->persist($car2);
        $manager->flush();
    }
}

?>