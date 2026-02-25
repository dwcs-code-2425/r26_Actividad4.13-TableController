<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TableController extends AbstractController
{

const MAX_RANDOM_NUMBER = 100;
    #[Route('/table/{filas?4}/{cols<[1-9]\d*>}', name: 'app_table', requirements:["filas" => "[1-9]\d*"])]
    public function index(int $filas, int $cols=4): Response
    {

        for ($i = 0; $i < $filas; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                $tabla[$i][$j] = random_int(0, self::MAX_RANDOM_NUMBER);
            }
        }
        return $this->render('table/index.html.twig', [
            'controller_name' => 'TableController',
            'filas_tabla' => $filas,
            'cols_tabla' => $cols, 
            'tabla' => $tabla
        ]);
    }
}
