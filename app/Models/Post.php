<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id']; 

    protected $with = ['author','category']; 



    //scope filter untuk memilah data (untuk fitur search)
    //saya juga bingung mengapa bisa begini, mungkins aya harus banyak2 buat project
    //laravel. sebenarnya apa maksud daru variabel query ini? hah? j4n koyok c0ck
    public function scopeFilter($query, array $filters ){//ini lagi apa, yang dimasulkan argument pertama tapi yang nangani parameter ke dua?


        //[ini yang akan dilakukan bila menggunakan if else]
        /*
        if(isset($filters['search']) ? $filters['search'] : false ){ //bila requestada
            $query->where('title', 'like', '%'.request('search').'%')
                  ->orWhere('body', 'like', '%'.request('search').'%');
        }
        */

        //namun kita akan menggunakan salahsatu method dari collection, yaitu when(condition, callback)
        /*
        $query->when($filters['search'] ?? false, function($query, $search){
            //saya masih bingung parameter diatas, tapi yg saya dapat nilai param 1 adalah nilai yang akan dimasukan kedalam search
            //sementara untuk param 2 adalah nilai dari collectionya sendiri
            //nah, karena diatas mengunakan operasi '??' (lihat dokumentasi php), jadi nilai yang dibawa oleh $search
            //adalah nilai filtes['search'] 
            return $query->where('title', 'like', '%'.request('search').'%')
                        ->orWhere('body', 'like', '%'.request('search').'%');
        });
        */

        //ini adalah perbaikan untuk yag diatas
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                 $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('body', 'like', '%' . $search . '%');
            });
        });


        //tambah query lagi, karena data kriteria yang di kirim lebih ddari 1
        //tapi untuk query yang dibawah sangatlah memutar balikan kepala, karena bukan selection
        //yang dikerjakan, tapi join table yang akan dijalanakan.
        //beuh... saya saja tidak faham.
        //tapi intinya laravel sudah melakukan suatu join table
        $query->when($filters['category'] ?? false, function($query, $category){ 
            return $query->whereHas('category', function($query) use ($category){ //keyword use disini digunakan supaya variabel $category dapat digunakan pada function didalamnya
                $query->where('slug', $category); //huh?? kok slug yg dijadikan pengidentifikasi, j$ncvk emang || elaha , ternyata category jug ada slugnya
            });
        });


        ///aaaghhrr, ini untuk author
        $query->when($filters['author'] ?? false, function($query, $author){
            return $query->whereHas('author', function($query) use ($author){
                $query->where('username', $author);
            });
        });
    }

    //berikut untuk membuat relationship dengann category
    public function category(){
        return $this->belongsTo(Category::class); 
    }
    
    //relationtion with user
    public function author(){ 
        return $this->belongsTo(User::class, 'user_id');
    }

    //untuk mengganti default indentifier untuk mengambil data pada model post
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
