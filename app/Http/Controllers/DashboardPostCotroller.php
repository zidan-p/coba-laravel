<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

class DashboardPostCotroller extends Controller
{
    //untuk menangani method get
    //langsung ditangan pada route resource
    public function index()
    {
        //silvia84@gmail.com
        return view('dashboard.posts.index',[
            'posts' => Post::where('user_id' , auth()->user()->id)->get()
        ]);
    }


    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }


    //untuk menampah data (post)
    public function store(Request $request)
    {
        // ddd($request);
        // return $request->file('image')->store('img-post');//cara menyimpan gambar, dapat mengkases dengan method file('name_field'), lau store('folder')


        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:posts',
            'image' => 'image|file|', //tidak saya kasih file supaya mudah di masukan
            'category_id' => 'required',
            'body' => 'required'
        ]);

        //jika gambar ada, maka simpan pada folder berikut
        if($request->file('image')){
            $validated['image'] = $request->file('image')->store('img-post'); //simpan nama gambarnya ke array validated, jadi bukan gambarnya yg disimpan
        }

        //mengambil user id dan excerpt
        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->body), 200, '...'); //intinya seperti ini cara mengambilnya, tidak perlu dijelaskan pasti sudah tahu
        //strip_tags digunkan untuk menghilangkan tag html pada sebuah string
        

        //melakukan penambahan data ke databased
        Post::create($validated);

        //melakukan redirect dengan membawa flash
        return redirect('/dashboard/posts')->with('success', 'new post has been added 🖼');
    }


    public function show(Post $post)
    {
        return view('dashboard.posts.show',[
            'post' => $post
        ]);
    }


    //untuk menampilkan halaman edit
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit',[
            'categories' => Category::all(),
            'post' => $post
        ]);
    }


    public function update(Request $request, Post $post)
    {

        //validasinya dditampung pada sebuah rules dahulu
        //supaya seumapa user tadak ingin mengubah slug, tidak masuk validasi
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required'
        ];

        if($request->slug != $post->slug){
            $rules['slug'] = 'required|max:255|unique:posts';
        }

        $validated = $request->validate($rules);

        //mengambil user id dan excerpt
        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');
        

        //melakukan update ke data base.
        //pertama akan dicari post yang akan diupdate, lalu melakukan update
        Post::where('id', $post->id)
            ->update($validated);

        //melakukan redirect dengan membawa flash
        return redirect('/dashboard/posts')->with('success', 'a post has been updated 🔔');
    }


    //untuk menhapus data yang dikir menggunakan  method delete
    public function destroy(Post $post)
    {
        //data dari request di cari berdasarkan slug, karena sudah dibinding
        //sementara data yang di cari berdasarkan
        Post::destroy($post->id); 

        //melakukan redirect dengan membawa flash
        return redirect('/dashboard/posts')->with('success', 'post has been delete ❌');
    }

    //function untuk mnegmbalikan slug
    public function checkSlug(Request $request){

        //SlugService::createSlug(model_yang_ingin_diberi_slug, 'field_slug', "string_untuk_diubah")
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
