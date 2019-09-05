<?php

namespace App\DataFixtures;

use App\Entity\Viaje;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ViajeFixtures extends Fixture
{
    protected $faker;

    public function load(ObjectManager $manager)
    {
        $this->faker = Factory::create('es_VE');

        for ($i = 0; $i < 10; $i++) {
            $viaje = new Viaje();
            $viaje->setCodigo($this->faker->unique()->numberBetween($min = 1000, $max = 9000));
            $viaje->setPlazas(50);
            $viaje->setOrigen($this->faker->country);
            $viaje->setDestino($this->faker->country);
            $viaje->setPrecio($this->faker->randomFloat);
            $manager->persist($viaje);
        }

        $manager->flush();
    }
}
