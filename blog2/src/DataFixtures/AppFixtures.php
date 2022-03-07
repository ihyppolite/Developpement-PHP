<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface ;

class AppFixtures extends Fixture

{

    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    public function load(ObjectManager $manager): void
    
    {
        $faker = Faker\Factory::create();
        
        $users=[];
        $categorys=[];

      
       for ($i = 0; $i < 5; $i++) {
        $category= new Category();
        $category->setName($faker->word);
        $category->setDescription($faker->realText(50,2));
        $manager->persist($category);
         $categorys[$i]=$category;

       }

       


       
       for ($i = 0; $i < 3; $i++) {
        $user = new User();
        $user->setName($faker->name);
        $user->setEmail($faker->email);
        $password = $this->hasher->hashPassword($user, 'pass_1234');
        $user->setPassword($password);
        $user->setRoles(['Roles_User']);
        $manager->persist($user);
        $users[$i]=$user;
       }


        for ($i = 0; $i < 100; $i++) {

            $content=$faker->realText(400,2);
            $post = new Post();
            $post->setTitle('post '.$i);
            $post->setAutor($users[rand(0,2)]);
            $post->setContent($content);
            $post->setDate();
            $post->setCategory($categorys[rand(0,4)]);
            $manager->persist($post);
        }

        $manager->flush();
            
    }
}
