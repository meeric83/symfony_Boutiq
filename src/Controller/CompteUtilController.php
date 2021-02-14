<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


    /**
     * @Route("/compte_util")
     */
class CompteUtilController extends AbstractController
{
    /**
     * @Route("/", name="compte_util")
     */
    public function index(): Response
    {
        return $this->render('compte_util/index.html.twig', [
        ]);
    }
}
