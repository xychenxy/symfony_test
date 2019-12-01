<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FomanticIndexController extends AbstractController
{
    /**
     * @Route("/fomantic/index", name="fomantic_index")
     */
    public function index()
    {
        return $this->render('fomantic_index/index.html.twig', [
            'controller_name' => 'FomanticIndexController',
        ]);
    }
}
