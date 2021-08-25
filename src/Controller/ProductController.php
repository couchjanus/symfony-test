<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Brand;


class ProductController extends AbstractController
{
    #[Route('/product', name: 'product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    #[Route("/create-product", name:"create_product")]
    public function createProduct(): Response
    {
        $category = new Category();
        $category->setName('Computer Peripherals');
        $category->setDescription('Computer Peripherals');

        $brand = new Brand();
        $brand->setName('Peripherals and Co');
        $brand->setDescription('Peripherals and Co');

        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(19.99);
        $product->setStockQuantity(199);

        $product->setDescription('Ergonomic and stylish!');

        // связывает этот продукт с категорией
        $product->setCategory($category);
        $product->setBrand($brand);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($category);
        $entityManager->persist($brand);
        $entityManager->persist($product);
        $entityManager->flush();

        return new Response(
            'Saved new product with id: '.$product->getId()
            .' new category with id: '.$category->getId().' and new brand with id: '.$brand->getId()
        );
        // bin/console doctrine:query:sql 'SELECT * FROM product'
    }

    #[Route("/product/{id}", name:"product-show")]
    public function show(int $id): Response
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $categoryName = $product->getCategory()->getName();
        $brandName = $product->getBrand()->getName();

//        return new Response('Check out this great product: '.$product->getName());

        return new Response('Check out this great product: '.$product->getName().' Category: '.$categoryName.' Brand name:'.$brandName);





         // or render a template
        // in the template, print things with {{ brand.name }}
        // return $this->render('brand/show.html.twig', ['brand' => $brand]);
    }
}
