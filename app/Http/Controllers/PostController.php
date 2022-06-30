<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    public function index(){ 
        //ini adalah tempat untuk menerima query (atau body? saya tidak tahu) dari method get maupun post
        // dd(request('search')); //untuk cek request

        //bila menggunakan pencarian dari sini
        /*
        $posts = Post::latest();
        if(request('search')){ //bila request dengan nama searc ada
            $posts->where('title', 'like', '%'.request('search').'%')
                  ->orWhere('body', 'like', '%'.request('search').'%');
        }
        */

        //untuk menambahkan keterangan dari allpost
        $title = '';
        if(request('category')){
            $title = ' in '. Category::firstWhere('slug', request('category'))->name;
        }
        if(request('author')){
            $title = ' by '. User::firstWhere('username', request('author'))->name;
        }

        return view('posts', [
            "title" => "Posts All" . $title,
            'active' => 'posts',
            // "posts" => Post::latest()->filter(request(['search', 'category','author']))->get() //filter disamping dari scope modelsnya.saya juga bingung, apakan scope harus mengguankan huruf besar? ini adalah unuk mendapat seluruh data
            "posts" => Post::latest()->filter(request(['search', 'category','author'])) //untuk menggunakana pagination, kita cukup mengganti method get menjadi paginate(jumah data)
                            ->paginate(7)->withQueryString()//method withqueryString digunakan supaya query sebelumnya masih bisa dijalankan.
        ]);
    }

    public function show(Post $post){
        return view('post', [
            "title" => "single post",
            'active' => 'posts',
            "post" => $post
        ]);
    }
}
