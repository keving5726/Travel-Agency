<?php

namespace App\Controller;

use App\Entity\Boleto;
//use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\Response;
//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BoletoController
{
    private $boleto;

    public function __invoke(Boleto $data): Boleto
    {
        $this->boleto->handle($data);

        return $data;
    }
}
