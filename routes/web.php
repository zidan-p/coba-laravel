<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
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


Route::get("/post/{slug}", [PostController::class, 'show']);
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

