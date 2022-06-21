<?php

namespace App\Models;

use phpDocumentor\Reflection\Types\Self_;

class Post
{
    private static $posts = [
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
          "title" => "Berita nomer 2",
          "slug" => "berita_nomer_2",
          "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab dolore reprehenderit eius, ipsam ullam numquam! Tempora, minus. Et saepe veniam autem velit maxime ipsam porro, laudantium iusto quod quasi inventore.
          Commodi harum excepturi tempore fuga magni nulla? Explicabo obcaecati mollitia rem pariatur voluptatum, beatae error ab ex ipsa consequuntur, voluptates tenetur ut voluptatem officiis perspiciatis sequi minus quos ducimus. Architecto?
          Veritatis dolore odit error officia tempora aspernatur non ullam tenetur sit, illo itaque, accusamus nisi quisquam fuga dignissimos incidunt libero rem fugit, vero aliquam eveniet eos? Amet suscipit magnam tempore!
          Distinctio nesciunt, necessitatibus nisi quibusdam earum eos libero pariatur soluta enim dignissimos, recusandae accusamus, fugiat est provident corrupti esse amet? Tempore eum, magni excepturi omnis nihil suscipit error voluptatum saepe!"
        ]
    ];

    //function urnuk mengembalikan semua nilai pada post
    //supaya dapat diakses pada berkas/class lain
    public static function all(){
        return collect(Self::$posts); //direturn menjadi collection dengan method collect, supaya data dapat mendapatkan beberapa method bawaan
    }

    //function untuk mmencari data artikel berdasarkan slug
    public static function find($slug){
        $posts = static::all();

        /* ------- bila tidak menggunakan collection ---------
        $newArr = [];
        foreach($posts as $post){
            if($post['slug'] == $slug){
              $newArr = $post;
            }
        }
        */
        return $posts->firstWhere('slug',$slug); 
        //method firstwhere digunakan untuk mencari nilai awal yang memenuhi syarat
        //pada suatu collection
        //parameter pertama berupa key yang akan dicocokan (jika cocok akan menghasilkan array dengan nilai tersebut)
        //parameter kedua adalah nilai yang dicari

    }
}



/*
1. -----
karena yang dibutuhkan hanta modelnya saja, kita hanya
memerlukan classnya saja, tidak pelu import maupun exted
kecuali namespace

2. ----------
barulah pada class itu ditambahai properti static yang nantinya akan diakses
seolah2 daa itu datang dari database, juga menggunakanya dapat membuat
function route menjadi lebih bersih


*/