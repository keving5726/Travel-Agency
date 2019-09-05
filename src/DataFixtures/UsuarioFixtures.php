<?php

namespace App\DataFixtures;

use App\Entity\Usuario;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsuarioFixtures extends Fixture
{
    protected $faker;
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $this->faker = Factory::create('es_VE');

        for ($i = 0; $i < 30; $i++) {
            $usuario = new Usuario();
            $usuario->setCedula($this->faker->unique()->nationalId('-'));
            $usuario->setNombre($this->faker->firstName);
            $usuario->setApellido($this->faker->lastName);
            $usuario->setDireccion($this->faker->address);
            $usuario->setTelefono($this->faker->phoneNumber);
            $usuario->setPassword($this->passwordEncoder->encodePassword($usuario, '12345678'));
            $manager->persist($usuario);
        }

        $manager->flush();
    }
}
