<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index(){

        return view('posts', [
          "title" => "posts",
          "posts" => Post::all()
        ]);
    }

    public function show(Post $post){  //nah, disinal nantinya param akan ditangkap sebagai tipe data models, seabagi sebuah object yang berisi data rows yang sesuai dengan selectionya
        // $newArray = Post::finpost); // kita sudah tidak pelu lagi ini
        return view('post', [
            "title" => "single post",
            "post" => $post //post disini bukanlah string slug, melainkan data yang sesuai dengan selection dengan slug. saya tidak tahu nama var yg cocok
        ]);
    }
}
