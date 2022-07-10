<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            'title' => 'login',
            'active' => 'login'
        ]);
    }


    public function authenticate(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        //setelah validasi berhasail, kali ini kita akan melakukan autentikas
        //mengecek apakah email dan password cocok dan sesuai (email ada dan password cocok)

        //bila tidak maka langsung kirimkan pesan login gagal
        //bila kita menambhkan pesan lain2 kemungkinan besar 
        //akan menjadi celah keamaan tersendiri untuk website kita
        
        if(Auth::attempt($credentials)){  //saya bingung, auth ini digunakan untuk membandingkana apa? dan bagaimana bisa tahu kalu yg di cocokan adalah users?
            //jika percobaan untuk login berhsi maka jalanakan kode didalam
            $request->session()->regenerate(); //mengenerate ulang session bila berhasil (untuk menghindari session fixation //lihat wikipedia)

            return redirect()->intended('/dashboard');//menggunakan intendedn supaya dapat diproses oleh midleware
        }

        //bila perboaan gagal maka kode dibawah akan dijalanakan
        //method mack digunakaan untuk kembali serta ditambah with untuk flahs message
        return back()->with('errorLogin', 'login gagal!!!');
    }


    //logout, yaitu digunakan untuk lgout
    //fungsi dibawah ini dicopas dari doc, jadi saya tidak terlalu tahu menahu mengenai nya
    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate(); //suapay tidak digunakan
     
        $request->session()->regenerateToken(); //dibuat baru supaya tidak dibajak
     
        return redirect('/');//hmm
    }
}
