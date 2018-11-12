<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
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
        $users = User::with('posts')->orderBy('name')->paginate(4);
        return view('back.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.users.create');
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
            'name' => 'required',
            'email' => 'required',
            'bio' => 'required',
            'role' => 'required'
        ]);
        $u = new User;
        $u->name = $request->name;
        $u->slug = rand(1, 99).str_slug($request->name).rand(1,99);
        $u->email = $request->email;
        $u->bio = $request->bio;
        $u->save();
        $u->attachRole($request->role);
        Session::flash('success', 'User created successfully.');
        return redirect()->route('users.index');
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
    public function edit($id)
    {
        $user = User::find($id);
        return view('back.users.edit', compact('user'));
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
            'name' => 'required',
            'email' => 'required',
            'bio' => 'required',
            'role' => 'required'
        ]);
        $u = User::find($id);
        if ($request->has('password')){
            $u->password = bcrypt($request->password);
        }
        $u->name = $request->name;
        $u->slug = rand(1, 99).str_slug($request->name).rand(1,99);
        $u->email = $request->email;
        $u->bio = $request->bio;
        $u->save();
        $u->detachRole($u->role);
        $u->attachRole($request->role);
        Session::flash('success', 'User Updated successfully.');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $u = User::find($id);
        $u->delete();
        Session::flash('success', 'User Deleted successfully.');
        return redirect()->route('users.index');
    }
}
