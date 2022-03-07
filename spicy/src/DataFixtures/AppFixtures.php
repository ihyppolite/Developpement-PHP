<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create();

        $categorys=[];
        $products=[];
        
       for ($i = 0; $i < 5; $i++) {
        $category= new Category();
        $category->setName($faker->word);
        $category->setDescription($faker->realText(50,2));
        $manager->persist($category);
        $categorys[$i]=$category;

       }

       for ($i = 0; $i < 15; $i++) {
        $product= new Product();
        $product->setName($faker->word);
        $product->setDescription($faker->realText(50,2));
        $product->setPrice($faker->randomFloat(2));
        $product->setImage( $faker->imageUrl(640, 480, 'animals', true));
        $product->setCategory($categorys[rand(0,4)]);
        $manager->persist($product);
        
        $products[$i]=$product;

       }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
