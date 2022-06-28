<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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


Route::get("/", function(){
  return view('home', [
    "title" => "home"
  ]);
});


Route::get("/about", function(){
  return view('about', [
    "title" => "about",
    "name" => "Zidan Putra rahman",
    "email" => "zidanputrarahman153@gmail.com",
    "image" => "pantai.png"
  ]);
});


Route::get("/posts", [PostController::class, 'index']); //berikut cara adalah memanggil controller 

/* --- bila tidak menggunakan controller ---
Route::get("/posts", function(){
  // mngambil semua data blog dari model
  $blog_post = Post::all();
  return view('posts', [
    "title" => "posts",
    "posts" => $blog_post
  ]);
});
*/


Route::get("/post/{post:slug}", [PostController::class, 'show']); //artinya, kita akan mengirim nilai string post dan melakukan selection pada column slug(string ber kolllom slug)
//disini dilakukan pengmabilan data dari model
/* --- bila tidak menggunakan controller ---
Route::get("/post/{slug}", function($slug){
  $newArray = Post::find($slug);//menggunakan method pada model
  return view('post', [
    "title" => "single post",
    "post" => $newArray
  ]);
});
*/

//untuk daftar categories
Route::get('/categories',function(){
  return view('categories', [
    'title' => 'Daftar categories',
    'categories' => Category::all()
  ]);
});


//controler untuk post dengan category yang terselection
Route::get('/category/{category:slug}', function(Category $category){
  return view('category', [
    'title' => $category->name,
    'posts' => $category->posts,
    'category' => $category
  ]);
});


//----------- categories and category ----------
Route::get('/author/{author:username}', function (User $author){ 
  //masih tidak tahu mengapa author bisa dejadikan sebagai model?
  //pada yang dialiasing adalah methodnya saja
  return view('author', [
    'author' => $author->name,
    'title' => 'author',
    'posts' => $author->posts,

  ]);
});

