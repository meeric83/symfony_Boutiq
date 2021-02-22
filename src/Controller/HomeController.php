<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Repository\HomeSliderRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ProductRepository $repoProduct, HomeSliderRepository $repoHomeSlider): Response
    {
        $homeSlider = $repoHomeSlider->findBy(['isDisplayed'=>true]);
        $products = $repoProduct->findAll();
        $productBestSeller = $repoProduct->findByIsBestSeller(1);
        $productSpecialOffer = $repoProduct->findByIsSpecialOffer(1);
        $productNewArrival = $repoProduct->findByIsNewArrival(1);
        $productFeatured = $repoProduct->findByIsFeatured(1);
        //dd([$productBestSeller, $productSpecialOffer, $productNewArrival, $productFeatured ]);
        //dd($products);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'products' =>$products,
            'productBestSeller'=> $productBestSeller,
            'productSpecialOffer'=> $productSpecialOffer,
            'productNewArrival'=> $productNewArrival,
            'productFeatured'=> $productFeatured,
            'homeSlider' => $homeSlider,

        ]);
    }

    /**
     * @Route("/product/{slug}",name="product_details")
     */

    public function show(?Product $product):Response{  //le point d'interrogation cesr dire quon peut recevoir un produit dans le cas cest possible sinon on peut recevoir nul

        if(!$product){
            return  $this->redirectToRoute('home');
        }

        return $this->render("home/single_product.html.twig",[
            'product' => $product
        ]);
    }


    
    /**
     * @Route("/shop", name="shop")
     */

    public function shop(ProductRepository $repoProduct): Response
    {
        $products = $repoProduct->findAll();
       
        return $this->render('home/shop.html.twig', [
            'controller_name' => 'HomeController',
            'products' =>$products,
            

        ]);
    }


    
   

}
