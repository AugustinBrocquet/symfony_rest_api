<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Entity\Product;

/**
 * Product controller.
 * @Route("/api", name="api_")
 */
class ProductController extends FOSRestController
{

  /**
   * Lists all Products.
   * @Rest\Get("/products")
   *
   * @return Response
   */
  public function getProducstAction()
  {
    $repository = $this->getDoctrine()->getRepository(Product::class);
    $products = $repository->findall();
    return $this->handleView($this->view($products));
  }

  /**
   * Return a Product.
   * @Rest\Get("/product/{product_id}")
   *
   * @return Response
   */
  public function getProductAction(Request $request)
  {
    $repository = $this->getDoctrine()->getRepository(Product::class);
    $product = $repository->find($request->get('product_id'));

    if ( $product ) {
      return $this->handleView($this->view($product), Response::HTTP_OK);
    } else {
      return $this->handleView($this->view([]), Response::HTTP_OK);
    }

    
  }

  /**
   * Create Product.
   * @Rest\Post("/product")
   *
   * @return Response
   */
  public function addProductAction(Request $request)
  {
    $product = new Product();
    $data = json_decode($request->getContent(), true);

    try {
        $product->setName($data['name']);
        $product->setDescription($data['description']);
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();
        return $this->handleView($this->view(['success' => true], Response::HTTP_CREATED));
    
    } catch (Exception $e) {
        return $this->handleView($this->view(['success' => false, 'message' => $e], Response::HTTP_BAD_REQUEST));
    }
    

  }
}