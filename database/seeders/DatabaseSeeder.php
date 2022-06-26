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
        //ini adalah contoh bawaan dari laravel [menggunakna factory]
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //------------ USERS -------------
        User::create([
            'name' => 'Zidan Putra Rahman',
            'email' => 'zidanputrarahman153@gmail.com',
            'password' => bcrypt('1234')
        ]);
        
        User::create([
            'name' => 'nurhadi lukojoyo',
            'email' => 'narkoisme@gmail.com',
            'password' => bcrypt('1234')
        ]);

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
        Post::create([
            'title' => 'judul ke 1',
            'user_id' => 1,
            'slug' => 'judul-ke-1',
            'category_id' => 1,
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut provident enim nulla facilis quis,explicabo eum ipsa ducimus ratione quam quod porro accusamus saepe dolore rem, ipsum fuga amet. Voluptatum!',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut provident enim nulla facilis quis,explicabo eum ipsa ducimus ratione quam quod porro accusamus saepe dolore rem, ipsum fuga amet. Voluptatum! Tempore quaerat tempora consequuntur consectetur accusantium commodi recusandae, sapiente, mollitia alias, optio ea natus dicta. Eos incidunt, eius, dicta reprehenderit aperiam rem dolores in quia molestiae et id sint debitis. Voluptas, iusto in pariatur dolores necessitatibus tempora accusamus officia.</p><p> corporis perferendis adipisci distinctio sed ipsa id aspernatur porro doloremque veritatis quos praesentium eum dignissimos sit. A eum ut id nobis? Autem, quam! Ad ullam maiores unde distinctio eveniet, commodi maxime deleniti molestiae dicta delectus voluptates nulla dolore hic ipsam amet! Consectetur nam tempora non, quas officia quis molestiae ad aliquid. Dolorum, accusantium recusandae natus debitis iste, numquam nam nihil tempora maxime, minima blanditiis ex? Error, odio nesciunt dolorum, dolorem natus doloremque ipsam temporibus consequatur culpa non repudiandae ab suscipit at. Iure ea asperiores corrupti adipisci, reiciendis magnam sapiente dolores.</p><p> molestias perferendis doloremque aliquam a atque dignissimos tempora ipsam esse sit maiores maxime, nulla ullam assumenda deleniti optio! Nihil, neque porro? Ratione rerum voluptatibus inventore sint quis, eos reiciendis ea consequuntur veritatis eius sit cumque molestiae ab provident mollitia natus corporis perspiciatis vel officia accusantium, delectus maxime nulla aperiam? Molestiae, eum? Harum nemo ratione deserunt quibusdam quidem reprehenderit tenetur. Aspernatur sunt ullam magnam consectetur et ab eum! Nihil dolorem in eius expedita doloribus voluptatum ratione quia cumque voluptates eaque? Molestias, iusto! </p>'
        ]);

        Post::create([
            'title' => 'judul ke 2',
            'user_id' => 2,
            'slug' => 'judul-ke-2',
            'category_id' => 2,
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut provident enim nulla facilis quis,explicabo eum ipsa ducimus ratione quam quod porro accusamus saepe dolore rem, ipsum fuga amet. Voluptatum!',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut provident enim nulla facilis quis,explicabo eum ipsa ducimus ratione quam quod porro accusamus saepe dolore rem, ipsum fuga amet. Voluptatum! Tempore quaerat tempora consequuntur consectetur accusantium commodi recusandae, sapiente, mollitia alias, optio ea natus dicta. Eos incidunt, eius, dicta reprehenderit aperiam rem dolores in quia molestiae et id sint debitis. Voluptas, iusto in pariatur dolores necessitatibus tempora accusamus officia.</p><p> corporis perferendis adipisci distinctio sed ipsa id aspernatur porro doloremque veritatis quos praesentium eum dignissimos sit. A eum ut id nobis? Autem, quam! Ad ullam maiores unde distinctio eveniet, commodi maxime deleniti molestiae dicta delectus voluptates nulla dolore hic ipsam amet! Consectetur nam tempora non, quas officia quis molestiae ad aliquid. Dolorum, accusantium recusandae natus debitis iste, numquam nam nihil tempora maxime, minima blanditiis ex? Error, odio nesciunt dolorum, dolorem natus doloremque ipsam temporibus consequatur culpa non repudiandae ab suscipit at. Iure ea asperiores corrupti adipisci, reiciendis magnam sapiente dolores.</p><p> molestias perferendis doloremque aliquam a atque dignissimos tempora ipsam esse sit maiores maxime, nulla ullam assumenda deleniti optio! Nihil, neque porro? Ratione rerum voluptatibus inventore sint quis, eos reiciendis ea consequuntur veritatis eius sit cumque molestiae ab provident mollitia natus corporis perspiciatis vel officia accusantium, delectus maxime nulla aperiam? Molestiae, eum? Harum nemo ratione deserunt quibusdam quidem reprehenderit tenetur. Aspernatur sunt ullam magnam consectetur et ab eum! Nihil dolorem in eius expedita doloribus voluptatum ratione quia cumque voluptates eaque? Molestias, iusto! </p>'
        ]);

        Post::create([
            'title' => 'judul ke 3',
            'user_id' => 1,
            'slug' => 'judul-ke-3',
            'category_id' => 2,
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut provident enim nulla facilis quis,explicabo eum ipsa ducimus ratione quam quod porro accusamus saepe dolore rem, ipsum fuga amet. Voluptatum!',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut provident enim nulla facilis quis,explicabo eum ipsa ducimus ratione quam quod porro accusamus saepe dolore rem, ipsum fuga amet. Voluptatum! Tempore quaerat tempora consequuntur consectetur accusantium commodi recusandae, sapiente, mollitia alias, optio ea natus dicta. Eos incidunt, eius, dicta reprehenderit aperiam rem dolores in quia molestiae et id sint debitis. Voluptas, iusto in pariatur dolores necessitatibus tempora accusamus officia.</p><p> corporis perferendis adipisci distinctio sed ipsa id aspernatur porro doloremque veritatis quos praesentium eum dignissimos sit. A eum ut id nobis? Autem, quam! Ad ullam maiores unde distinctio eveniet, commodi maxime deleniti molestiae dicta delectus voluptates nulla dolore hic ipsam amet! Consectetur nam tempora non, quas officia quis molestiae ad aliquid. Dolorum, accusantium recusandae natus debitis iste, numquam nam nihil tempora maxime, minima blanditiis ex? Error, odio nesciunt dolorum, dolorem natus doloremque ipsam temporibus consequatur culpa non repudiandae ab suscipit at. Iure ea asperiores corrupti adipisci, reiciendis magnam sapiente dolores.</p><p> molestias perferendis doloremque aliquam a atque dignissimos tempora ipsam esse sit maiores maxime, nulla ullam assumenda deleniti optio! Nihil, neque porro? Ratione rerum voluptatibus inventore sint quis, eos reiciendis ea consequuntur veritatis eius sit cumque molestiae ab provident mollitia natus corporis perspiciatis vel officia accusantium, delectus maxime nulla aperiam? Molestiae, eum? Harum nemo ratione deserunt quibusdam quidem reprehenderit tenetur. Aspernatur sunt ullam magnam consectetur et ab eum! Nihil dolorem in eius expedita doloribus voluptatum ratione quia cumque voluptates eaque? Molestias, iusto! </p>'
        ]);

        Post::create([
            'title' => 'judul ke 4',
            'user_id' => 1,
            'slug' => 'judul-ke-4',
            'category_id' => 3,
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut provident enim nulla facilis quis,explicabo eum ipsa ducimus ratione quam quod porro accusamus saepe dolore rem, ipsum fuga amet. Voluptatum!',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut provident enim nulla facilis quis,explicabo eum ipsa ducimus ratione quam quod porro accusamus saepe dolore rem, ipsum fuga amet. Voluptatum! Tempore quaerat tempora consequuntur consectetur accusantium commodi recusandae, sapiente, mollitia alias, optio ea natus dicta. Eos incidunt, eius, dicta reprehenderit aperiam rem dolores in quia molestiae et id sint debitis. Voluptas, iusto in pariatur dolores necessitatibus tempora accusamus officia.</p><p> corporis perferendis adipisci distinctio sed ipsa id aspernatur porro doloremque veritatis quos praesentium eum dignissimos sit. A eum ut id nobis? Autem, quam! Ad ullam maiores unde distinctio eveniet, commodi maxime deleniti molestiae dicta delectus voluptates nulla dolore hic ipsam amet! Consectetur nam tempora non, quas officia quis molestiae ad aliquid. Dolorum, accusantium recusandae natus debitis iste, numquam nam nihil tempora maxime, minima blanditiis ex? Error, odio nesciunt dolorum, dolorem natus doloremque ipsam temporibus consequatur culpa non repudiandae ab suscipit at. Iure ea asperiores corrupti adipisci, reiciendis magnam sapiente dolores.</p><p> molestias perferendis doloremque aliquam a atque dignissimos tempora ipsam esse sit maiores maxime, nulla ullam assumenda deleniti optio! Nihil, neque porro? Ratione rerum voluptatibus inventore sint quis, eos reiciendis ea consequuntur veritatis eius sit cumque molestiae ab provident mollitia natus corporis perspiciatis vel officia accusantium, delectus maxime nulla aperiam? Molestiae, eum? Harum nemo ratione deserunt quibusdam quidem reprehenderit tenetur. Aspernatur sunt ullam magnam consectetur et ab eum! Nihil dolorem in eius expedita doloribus voluptatum ratione quia cumque voluptates eaque? Molestias, iusto! </p>'
        ]);
    }
}
