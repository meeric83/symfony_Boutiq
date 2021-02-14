<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


    /**
     * @Route("/cgu")
     */
class ConditionGUController extends AbstractController
{
    /**
     * @Route("/conditions-generales-utilisations", name="cgu_conditions")
     */
    public function index(): Response
    {
        return $this->render('condition_gu/index.html.twig', [
            'controller_name' => 'ConditionGUController',
        ]);
    }
}
