<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        //------------ USERS -------------
        //dicomment untuk mencoba menggunakn factory
        /*
        User::create([
            'name' => 'Zidan Putra Rahman',
            'email' => 'zidanputrarahman153@gmail.com',
            'password' => bcrypt('1234')
        ]);
        */

        User::create([
            'name' => 'zidan',
            'username' => 'zidan-p',
            'email' => 'zidan@gmail.com',
            'password' => bcrypt('12345')
        ]);
        User::factory(3)->create();
        
        //------------ - CATEGORIES -----------------
        Category::create([
            'name' => 'web design',
            'slug' => 'web-design'
        ]);
        Category::create([
            'name' => 'programing',
            'slug' => 'programing'
        ]);
        Category::create([
            'name' => 'personal',
            'slug' => 'personal'
        ]);
        
        //--------------- POSTS ---------------------
        //coab menggunakan factory
        Post::factory(15)->create();
    }
}
