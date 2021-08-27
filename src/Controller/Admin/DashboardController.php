<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Product;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }


    public function configureDashboard(): Dashboard
    {
        // имя, видимое конечным пользователям
        return Dashboard::new()
            ->setTitle('Www');

    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('Comments', 'fas fa-comments', Comment::class);
        yield MenuItem::linkToCrud('Brands', 'fas fa-map-marker-alt', Brand::class);
        // links to the 'index' action of the Category CRUD controller
        yield MenuItem::linkToCrud('Categories', 'fa fa-tags', Category::class);
        yield MenuItem::linkToCrud('Products', 'fa fa-tags', Product::class);
        // links to a different CRUD action
//        yield MenuItem::linkToCrud('Add Category', 'fa fa-tags', Category::class)->setAction('new'),


    }
}

