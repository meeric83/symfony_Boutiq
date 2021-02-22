<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            SlugField::new('slug')->setTargetFieldName('name')->hideOnIndex(),  //creation du code du produit
            TextEditorField::new('description'),
            TextEditorField::new('moreInformations')->hideOnIndex(),
            MoneyField::new('price')->setCurrency('USD'),
            IntegerField::new('quantity'),
            TextField::new('tags'),
            BooleanField::new('isBestSeller', 'Best Seller'),
            BooleanField::new('isNewArrival','New Arrival'),
            BooleanField::new('isFeatured', 'Featured'),
            BooleanField::new('isSpecialOffer', 'Special Offer'),
            AssociationField::new('category'),
            ImageField::new('image')->setBasepath('/assets/uploads/imageproducts/')
                                    ->setUploadDir('\public\assets\uploads\imageProducts')
                                    ->setUploadedFileNamePattern('[randomhash].[extension]')
                                    ->setRequired(false),

                                ];
    }
    
}
