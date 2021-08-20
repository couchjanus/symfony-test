<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Category;


class CategoryController extends AbstractController
{
    #[Route('/category', name: 'category')]
    public function index(): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }
    /**
     * @Route("/category-create", name="create_category")
     */
    public function createCategory(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createCategory(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $category = new Category();
        $category->setName('Mouse');
        $category->setDescription('Ergonomic and stylish!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($category);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new category with id '.$category->getId());
        // bin/console doctrine:query:sql 'SELECT * FROM category'
    }

    /**
     * @Route("/category/{id}", name="category_show")
     */
    public function show(int $id): Response
    {
        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->find($id);

        if (!$category) {
            throw $this->createNotFoundException(
                'No category found for id '.$id
            );
        }

        return new Response('Check out this great category: '.$category->getName());

        // or render a template
        // in the template, print things with {{ category.name }}
        // return $this->render('category/show.html.twig', ['category' => $category]);
    }
}
