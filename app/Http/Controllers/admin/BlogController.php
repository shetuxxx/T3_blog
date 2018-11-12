<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check_p');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category', 'user')->latest()->paginate(5);
        return view('back.home', compact('posts'));
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->paginate(5);
        return view('back.trash', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('back.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'image' => 'image'
        ]);
        $post = new Post;
        if ($request->hasFile('image')){
            $img = $request->image;
            $img_name = time() . $img->getClientOriginalName();
            $a = $img->move('uploads/posts', $img_name);
            $d = 'uploads/posts/' . $img_name;
            $post->image = $d;

            // thumbnail
//            if ($a){
//                $extension = $img->getClientOriginalExtension();
//                $tumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $img_name);
//                $dt = asset('uploads/posts/' . $tumbnail);
//                //dd($dt);
//                ////////////////////SERVER HANG KORE////////////////////////////////////////////////
//                Image::make($d)->resize(250, 170)->save($dt);
//                // server hang kore /////////////////////////////////////////////////////////////////
//            }
        }

        $post->title = $request->title;
        $post->slug = rand(1, 99) . '-'. str_slug($request->title) . '-' . rand(1, 99);
        $post->user_id = Auth::id();
        $post->category_id = $request->category;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->save();
        Session::flash('success', 'Post created successfully.');
        return redirect()->route('allPosts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $categories = Category::all();
        return view('back.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'image' => 'image',
        ]);
        $post = Post::findOrFail($id);
        if ($request->hasFile('image')){
            if($post->image){
                unlink($post->image);
                // the img has to be saved without asset() for unlink to work
            }
            $img = $request->image;
            $img_name = time() . $img->getClientOriginalName();
            $img->move('uploads/posts', $img_name);
            $post->image = 'uploads/posts/' . $img_name;
        }

        $post->title = $request->title;
        $post->slug = rand(1, 99) . '-'. str_slug($request->title) . '-' . rand(1, 99);
        $post->user_id = Auth::id();
        $post->category_id = $request->category;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->save();
        Session::flash('success', 'Post updated successfully.');
        return redirect()->route('allPosts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //soft delete
        $p = Post::where('slug', $slug)->first();
        $id = $p->id;
        $p->delete();
        Session::flash('trash', ['Post trashed successfully.', $id]);
        return redirect()->route('allPosts');
    }

    public function restore($id){
        $p = Post::withTrashed()->findOrFail($id);
        $p->restore();
        Session::flash('success', 'Post restored successfully.');
        return redirect()->route('allPosts');
    }

    public function kill($id){
        //dd($id);
        $p = Post::withTrashed()->find($id);
        if($p->image){
            unlink($p->image);
            // the img has to be saved without asset() for unlink to work
        }
        $p->forceDelete();
        Session::flash('success', 'The Post deleted permanently');
        return redirect()->route('allPosts');
    }



}
