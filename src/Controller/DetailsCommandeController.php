<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DetailsCommandeController extends AbstractController
{
    /**
     * @Route("/details/commande", name="details_commande")
     */
    public function index()
    {
        return $this->render('details_commande/index.html.twig', [
            'controller_name' => 'DetailsCommandeController',
        ]);
    }
}
