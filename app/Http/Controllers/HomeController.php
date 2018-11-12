<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function editP($slug){
        $u = User::where('slug', $slug)->first();
        return view('back/users/editP', compact('u'));
    }

    public function updateP(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'bio' => 'required'
        ]);
        $u = User::find($id);
        if ($request->has('password')){
            $u->password = bcrypt($request->password);
        }
        $u->name = $request->name;
        $u->slug = rand(1, 99).'-'.str_slug($request->name).'-'.rand(1,99);
        $u->email = $request->email;
        $u->bio = $request->bio;
        $u->save();
        return redirect()->route('home');
    }



}
