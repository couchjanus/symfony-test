<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('name'),
            TextEditorField::new('description'),
            NumberField::new('price'),
            IntegerField::new('stock_quantity'),
            FormField::addPanel('Categories'),
            AssociationField::new('category')
                ->setRequired(true)
                ->setHelp('help text'),
            
            FormField::addPanel('Brands'),
            AssociationField::new('brand')
                ->setRequired(true)
                ->setHelp('help text'),
        ];
    }
    


//     public function configureFields(string $pageName): iterable
//     {
//         return [
//             FormField::addPanel('Conference'),
//             AssociationField::new('conference')
//                 ->setRequired(true)
//                 ->setHelp('help text'),
//             FormField::addPanel('Comment'),
//             TextField::new('author')
//                 ->setHelp('Your name'),
//             TextEditorField::new('text', 'Comment')
//                 ->setHelp('help text'),
//             EmailField::new('email', 'Email Address')
//                 ->setHelp('Your valid email address'),
//             DateTimeField::new('createdAt'),
//             TextField::new('photoFilename')
//         ];
//     }
// }
}
