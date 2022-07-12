<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostCotroller;

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
    "title" => "home",
    'active' => 'home',
  ]);
});


Route::get("/about", function(){
  return view('about', [
    "title" => "about",
    'active' => 'about',
    "name" => "Zidan Putra rahman",
    "email" => "zidanputrarahman153@gmail.com",
    "image" => "pantai.png"
  ]);
});


Route::get("/posts", [PostController::class, 'index']); //berikut cara adalah memanggil controller 
Route::get("/post/{post:slug}", [PostController::class, 'show']); //artinya, kita akan mengirim nilai string post dan melakukan selection pada column slug(string ber kolllom slug)


//untuk daftar categories
Route::get('/categories',function(){
  return view('categories', [
    'title' => 'Daftar categories',
    'active' => 'categories',
    'categories' => Category::all()
  ]);
});



//tampilan register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest'); //memmanggil controller index dan menampilkan index
//post register
Route::post('/register', [RegisterController::class, 'store']); //memmanggil controller setore


//tampilan login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); //cara menggunakan middleware // route disamping hanya bisa dijalanakan bila user belum login 
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']); //untuk melakukan logout



//untuk dashboard
Route::get('/dashboard', function(){
  return view('dashboard.index');
})->middleware('auth');

//route untuk mengolah title menjadi slug
Route::get('/dashboard/posts/checkSlug', [DashboardPostCotroller::class, 'checkSlug']);


//untuk resource controller post di dashboard
Route::resource('/dashboard/posts', DashboardPostCotroller::class)->middleware('auth');

//resource untuk mengkases pengelolaan categiry
//dilakukan pengecuailan untuk show, karena tidak ada deskripsi untuk category
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')
  ->middleware('admin');