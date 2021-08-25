<?php

namespace App\Controller;

use App\Entity\Brand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BrandController extends AbstractController
{
    #[Route('/brand', name: 'brand')]
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Brand::class);
        // искать *все* объекты
        $brands = $repository->findAll();
        dump($brands);
        return $this->render('brand/index.html.twig', [
            'controller_name' => 'BrandController',
        ]);
    }

    #[Route("/create-brand", name:"create_brand")]
    public function createBrand(): Response
    {
        //Получаем менеджер БД - Entity Manager
        $entityManager = $this->getDoctrine()->getManager();
        //Создаем экземпляр модели $brand = new Brand();
        $brand = new Brand();
        //Задаем значение полей $brand->setValue('value'); ...
        $brand->setName('Mouse Home');
        $brand->setDescription('Ergonomic and stylish mouse!');

        //Передаем менеджеру объект модели $em->persist($brand)
        $entityManager->persist($brand);

        //Добавляем запись в таблицу $em->flush();
        $entityManager->flush();

        return new Response('Saved new brand with id ' . $brand->getId());
        // bin/console doctrine:query:sql 'SELECT * FROM brand'
    }

    #[Route("/update-brand/{id}", name:"update_brand")]
    public function updateBrand(int $id): Response
    {
        //Получаем менеджер БД - Entity Manager
        $entityManager = $this->getDoctrine()->getManager();
        //Выбираем запись для обновления $brand = $this->getDoctrine()->getRepository(Brand::class)->find($id);
        $brand = $this->getDoctrine()->getRepository(Brand::class)->find($id);
        dump($brand);
        //Задаем значение полей $brand->setValue('value'); ...
        $brand->setName("Cat Home");
        $brand->setDescription("Ergonomic cats");
        //Передаем менеджеру объект модели $em->persist($brand)
        $entityManager->persist($brand);
        //Добавляем запись в таблицу $em->flush();
        $entityManager->flush();

        return $this->redirectToRoute('brand_show', [
            'id' => $brand->getId()
        ]);
//        return new Response('Updated brand with id ' . $brand->getId());
    }

    /**
     * @Route("/brand/{id}", name="brand_show")
     */
    public function show(int $id): Response
    {
        $brand = $this->getDoctrine()
            ->getRepository(Brand::class)
            ->find($id);

        if (!$brand) {
            throw $this->createNotFoundException(
                'No brand found for id '.$id
            );
        }

        return new Response('Check out this great brand: '.$brand->getName());

        // or render a template
        // in the template, print things with {{ brand.name }}
        // return $this->render('brand/show.html.twig', ['brand' => $brand]);
    }

    #[Route("/delete-brand/{id}", name:"delete_brand")]
    public function deletBrand(int $id): Response
    {
        //Получаем менеджер БД - Entity Manager
        $entityManager = $this->getDoctrine()->getManager();
        //Выбираем запись для обновления $brand = $this->getDoctrine()->getRepository(Brand::class)->find($id);
        $brand = $this->getDoctrine()->getRepository(Brand::class)->find($id);
//        dump($brand);

        $entityManager->remove($brand);
        // Метод remove() уведомляет Doctrine о том, что вы хотите удалить указанный объект из базы данных.
        // Запрос DELETE не выполняется до тех пор, пока не вызван метод flush().
        $entityManager->flush();

//        return $this->redirectToRoute('brand_show', [
//            'id' => $brand->getId()
//        ]);
        return new Response('Deleted brand with id ' . $id);
    }
}
