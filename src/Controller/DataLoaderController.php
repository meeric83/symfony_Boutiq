<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Categories;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DataLoaderController extends AbstractController
{
    /**
     * @Route("/data/", name="data_loader")
     */
    public function index(EntityManagerInterface $manager): Response
    {
        $file_products = dirname(dirname(__DIR__))."\DataProducts.json";
        $file_categories = dirname(dirname(__DIR__))."\DataCategories.json";
        $DataProducts = json_decode(file_get_contents( $file_products ))[0]->rows;
        $DataCategories = json_decode(file_get_contents( $file_categories ))[0]->rows;
        $categories = [];
        //dd($DataProducts);

        foreach ($DataCategories as $DataCategory) {
            # code...
            $category = new Categories();
            $category->setName($DataCategory[1])
                     ->setImage($DataCategory[3]);
            $manager->persist($category);
            $categories[] = $category;
        }




        foreach ( $DataProducts as $DataProduct) {
            # code...
            $product = new Product();
            $product->setName($DataProduct[1])
                        ->setDescription($DataProduct[2])
                        ->setPrice($DataProduct[4])
                        ->setIsBestSeller($DataProduct[5])
                        ->setIsNewArrival($DataProduct[6])
                        ->setIsFeatured($DataProduct[7])
                        ->setIsSpecialOffer($DataProduct[8])
                        ->setImage($DataProduct[9])
                        ->setQuantity($DataProduct[10])
                        ->setTags($DataProduct[12])
                        ->setSlug($DataProduct[13])
                        ->setCreatedAt(new \DateTime());                                            
            $manager->persist($product);
            $products[] = $product;

        }
        
       // $manager->flush();

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DataLoaderController.php',
        ]);
    }
}
