<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Produit;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
 


class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit")
     */
    public function index()
    {
        $em=$this->getdoctrine();
        $repoProduits=$em->getRepository(Produit::class);
        $produits= $repoProduits->findAll();
        //var_dump($produits);
        $encoders = new JsonEncoder();
        $normalizers = new ObjectNormalizer();
        $serializer = new Serializer([$normalizers], [$encoders]);
        $jsonContent = $serializer->serialize($produits, 'json',[
            'circular_reference_handler' => function ($object) {
            return $object->getId();
            }
        ]);
        //var_dump($jsonContent);exit;
        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');
        return $response; 
    }
}
