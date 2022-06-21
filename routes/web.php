<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () { //dijadikan sebagai histori belajar
//     return view('welcome');
// });

Route::get('/hello', function() {
    return 
    '{
        "author": "budi rusdianto",
        "title": "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
        "body": "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"
      },
      {
        "author": "hadi lukojoyo",
        "title": "qui est esse",
        "body": "est rerum tempore vitae\nsequi sint nihil reprehenderit dolor beatae ea dolores neque\nfugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis\nqui aperiam non debitis possimus qui neque nisi nulla"
      }
      
      ';
});

//untuk mendapatkan views home
//nuat terlebih dahulu viewnya di folder view dengan blade templatinng engine
Route::get("/", function(){
  return view('home', [
    "title" => "home"
  ]);
});

//untuk halaman about
//cara mengirimkan data ke templating engine blade
Route::get("/about", function(){
  return view('about', [
    "title" => "about",
    "name" => "Zidan Putra rahman",
    "email" => "zidanputrarahman153@gmail.com",
    "image" => "pantai.png"
  ]);
});



Route::get("/posts", function(){
  //blog post harus berada dalam routes supaya dapat digunakan variabelnnya
  $blog_post = [
    [
      "author" => "budi rusdianto",
      "title" => "Berita nomer 1",
      "slug" => "berita_nomer_1",
      "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab dolore reprehenderit eius, ipsam ullam numquam! Tempora, minus. Et saepe veniam autem velit maxime ipsam porro, laudantium iusto quod quasi inventore.
      Commodi harum excepturi tempore fuga magni nulla? Explicabo obcaecati mollitia rem pariatur voluptatum, beatae error ab ex ipsa consequuntur, voluptates tenetur ut voluptatem officiis perspiciatis sequi minus quos ducimus. Architecto?
      "
    ],
    [
      "author" => "hadi lukojoyo",
      "title" => "Berita selanjutnya",
      "slug" => "berita_selanjutnya",
      "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab dolore reprehenderit eius, ipsam ullam numquam! Tempora, minus. Et saepe veniam autem velit maxime ipsam porro, laudantium iusto quod quasi inventore.
      Commodi harum excepturi tempore fuga magni nulla? Explicabo obcaecati mollitia rem pariatur voluptatum, beatae error ab ex ipsa consequuntur, voluptates tenetur ut voluptatem officiis perspiciatis sequi minus quos ducimus. Architecto?
      Veritatis dolore odit error officia tempora aspernatur non ullam tenetur sit, illo itaque, accusamus nisi quisquam fuga dignissimos incidunt libero rem fugit, vero aliquam eveniet eos? Amet suscipit magnam tempore!
      Distinctio nesciunt, necessitatibus nisi quibusdam earum eos libero pariatur soluta enim dignissimos, recusandae accusamus, fugiat est provident corrupti esse amet? Tempore eum, magni excepturi omnis nihil suscipit error voluptatum saepe!"
    ]
  ];

  return view('posts', [
    "title" => "posts",
    "posts" => $blog_post
  ]);
});


//route untuk menangangi single post, nah konten dari halaman ini ditentukan dari url yang dikirimkan
//bisa dibilang ini seperti id bila pada js
//namun berbeda dengan id, untuk menginisialisasikan nilaianya kita menggunakan {}
//untuk mengambilnya dengan menjadikanya seabgai parameter fucntion

//perlu diketahui pula, untuk route dibawah dalam penerapan aslinya tidak seperti itu
//hanya dibuat seolah2 kita telah terhubung pada sebuah database
//untuk logikanya mungkin tidak terlalu rumit sehingga mungkin tidak saya beri koment lebih lanjut
Route::get("/post/{slug}", function($slug){
  $blog_post = [
    [
      "author" => "budi rusdianto",
      "title" => "Berita nomer 1",
      "slug" => "berita_nomer_1",
      "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab dolore reprehenderit eius, ipsam ullam numquam! Tempora, minus. Et saepe veniam autem velit maxime ipsam porro, laudantium iusto quod quasi inventore.
      Commodi harum excepturi tempore fuga magni nulla? Explicabo obcaecati mollitia rem pariatur voluptatum, beatae error ab ex ipsa consequuntur, voluptates tenetur ut voluptatem officiis perspiciatis sequi minus quos ducimus. Architecto?
      "
    ],
    [
      "author" => "hadi lukojoyo",
      "title" => "Berita selanjutnya",
      "slug" => "berita_selanjutnya",
      "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab dolore reprehenderit eius, ipsam ullam numquam! Tempora, minus. Et saepe veniam autem velit maxime ipsam porro, laudantium iusto quod quasi inventore.
      Commodi harum excepturi tempore fuga magni nulla? Explicabo obcaecati mollitia rem pariatur voluptatum, beatae error ab ex ipsa consequuntur, voluptates tenetur ut voluptatem officiis perspiciatis sequi minus quos ducimus. Architecto?
      Veritatis dolore odit error officia tempora aspernatur non ullam tenetur sit, illo itaque, accusamus nisi quisquam fuga dignissimos incidunt libero rem fugit, vero aliquam eveniet eos? Amet suscipit magnam tempore!
      Distinctio nesciunt, necessitatibus nisi quibusdam earum eos libero pariatur soluta enim dignissimos, recusandae accusamus, fugiat est provident corrupti esse amet? Tempore eum, magni excepturi omnis nihil suscipit error voluptatum saepe!"
    ]
  ];

  $newArray = [];

  foreach($blog_post as $post){
    if($post['slug'] == $slug){
      $newArray = $post;
    }
  }

  return view('post', [
    "title" => "single post",
    "post" => $newArray
  ]);
});

