<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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
        // $jsonContent='{"products":[{"id":1,"nom":"aza","prix":5}]}';
        $response = new Response($jsonContent);
        // $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');
        $response->headers->set('Access-Control-Allow-Headers' , 'Content-Type');

        return $response; 
    }

    /**
     * @Route("/create_product", name="create_product",methods={"POST"})
     */
    public function createProduct(Request $request)
    {
        // $data=$request->get('body');

        // return new Response('1');
        
        $params= array();
        $query=$request->getContent();
        foreach (explode('&', $query) as $chunk) {
            $param = explode("=", $chunk);

            if ($param) {
                //printf("La valeur du paramètre \"%s\" est \"%s\"<br/>\n", urldecode($param[0]), urldecode($param[1]));
                $params[urldecode($param[0])]=urldecode($param[1]);
            }
        }
        

        $entityManager = $this->getDoctrine()->getManager();
        
        $product = new Produit();
        $product->setNom($params['nom']);
        $product->setPrix($params['prix']);
        $product->setPoids($params['poids']);

        
        $entityManager->persist($product);

        $entityManager->flush();
        $response = new Response('Saved new product with id '.$product->getId());
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');
        $response->headers->set('Access-Control-Allow-Headers' , 'Content-Type');
        return $response;
    }
}
