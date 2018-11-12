<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function welcome(){
        return view('welcome');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $posts = Post::all();
//        $posts = Post::with('user')->orderBy('updated_at', 'desc')->get();
//        $categories = Category::with('posts')->orderBy('title', 'asc')->get();
        $posts = Post::with('user')->latest()->simplePaginate(3);
        return view('blog.index', compact( 'posts'));
    }

    public function category($slug){
        $category = Category::where('slug', $slug)->first();
        //dd($category);
        $catName = $category->title;
        $posts = Post::with('user')->where('category_id', $category->id)->simplePaginate(2);
//        $categories = Category::with('posts')->orderBy('title', 'asc')->get();
        return view('blog.index', compact( 'posts', 'catName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $p = Post::where('slug', $slug)->first();
//        return view('blog.show', compact('p'));


        // view_count = view_count + 1 where id = ?

        //#1
//        $new_view_count = $p->view_count + 1;
//        $p->update(['view_count' => $new_view_count]);

        //#2
        $p->increment('view_count');
//        $p->increment('view_count', 3);
        // by default 1 increase

        return view('blog.show', compact('p'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
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
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }


    public function sup($slug){
//        dd($name);
        $u = User::where('slug', $slug)->first();
//        dd($u);
        $userName = $u->name;
        $posts = Post::with('user')->where('user_id', $u->id)->simplePaginate(2);
        return view('blog.index', compact( 'posts', 'userName'));
    }



    public function test(){
        $p = Post::orderBy('view_count', 'desc')->take(3)->get();
        dd($p);
    }


}
