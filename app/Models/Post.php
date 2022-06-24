<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'excerpt', 'body']; //variabel fillabel ini harus dibuat supaya kita dapat melakukan mass assigment
    //selain dari yang ada pada fillabel tdak boleh di sisi
    //mass assugment adalah memasukan data secara seluruh dan bersamaan kedalam colom di db

    protected $guarded = ['id']; //kebalikan dari fillabel, semau yang ada selain didalam guarded boleh diisi

    //berikut untuk membuat relationship dengann category
    public function category(){
        return $this->belongsTo(Category::class); 
    }
}
