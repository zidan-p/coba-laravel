<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index',[
            'title' => 'register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request){
        
        //berikut bagai maca untuk melakukan validasi
        //bisa menggunakan string yang dipisan dengan `|`
        //atau menggunakan array
        //untuk validasi yang tersedia di laravel bisa dilihat dikomunetsainya
        //jadi ketika validasi lolos, maka kode program dibawahnya akan dijalanakn

        $data = $request->validate([ //jangan lupa isi data yg telah divalidasi pada sebuah variabel, variabel ini nantinya akan dikirim untuk dimasukan kedalam model
            'name' => 'required|max:225', //contoh menggunakan string
            'username' => ['required', 'min:3', 'max:225', "unique:users"], //contoh menggunakan array, maksuda dari uniqe disni adalah dalam tabel users tidak boleh ada yg sama, mungkin users disini mengikut tabel migration/mysql
            'email' => 'required|email:dns|unique:users', //'.com' merupakah suatu contoh dns, lengkapnya saya masih belum tahu
            'password' => 'required|min:5|max:255'
        ]);

        //bila validasi berhasi, maka kode disini akan dijalankan
        //semenatar untuk menangani bila ada yang error atau invalid
        //akan ditangkap oleh 
        //@error('nama_field_yang_error') ... jalanakan kode ini ... @enderror
        //bisa dilihat pada blade.
        //jadi bila kita tidak tangani errornya, maka seolah2 halaman akan kerefresh

        // dd('berhasil melakukan registrasi');

        //jangan lupa enkripsi passwordnya
        // ada 2 cara 
        $data['password'] = bcrypt($data['password']);
        // $data['password'] = Hash::make($data['password']); //<- huh? kok bisa?



        //menginputkan kedalam models
        User::create($data);

        //bial berhasil maka kirim pesan flash
        $request->session()->flash('success', 'Registration successfully, please login doolooo!'); //saya tidak tahu mengapa disamping dianggap error

        //diredirect ke login
        return redirect('/login');

        // atau lebih ringkas
        // return redirect('/login')->with('success', 'Registration successfully, please login doolooo!');
        //saya kurang tahu mengapa itu bisa terjadi, apakah with itu method yg berhubungan dengan session?
        //atau with itu method milti puspose> saya jga tidak tahu secuilpun.
    }
}
