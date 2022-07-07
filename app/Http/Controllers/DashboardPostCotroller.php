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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //untuk menampah data (post)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:posts',
            'category_id' => 'required',
            'body' => 'required'
        ]);

        //mengambil user id dan excerpt
        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->body), 200, '...'); //intinya seperti ini cara mengambilnya, tidak perlu dijelaskan pasti sudah tahu
        //strip_tags digunkan untuk menghilangkan tag html pada sebuah string
        

        //melakukan penambahan data ke databased
        Post::create($validated);

        //melakukan redirect dengan membawa flash
        return redirect('/dashboard/posts')->with('success', 'new post has been added 🖼');
    }

    /**
     * Display the specified resource.
     *
     * ini digunakan untuk return nilai post tertentu
     * semisal ingin menmapilkan post dengan id 2
     * 
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show',[
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    //function untuk mnegmbalikan slug
    public function checkSlug(Request $request){

        //SlugService::createSlug(model_yang_ingin_diberi_slug, 'field_slug', "string_untuk_diubah")
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
