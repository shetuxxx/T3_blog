@extends('layouts.admin')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Profile</h1>
            <ol class="breadcrumb pull-right">
                <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{route('index')}}">Blog</a>
                </li>
                <li>
                    <a href="{{route('users.index')}}">All Users</a>
                </li>
                <li class="active">Profile</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        {{--<!-- form start -->--}}
                        <form role="form" action="{{route('profile.update', ['id' => $u->id])}}" method="post">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{$u->name}}" placeholder="Enter Name here" >
                                    @if($errors->has('name'))
                                        <span class="help-block">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{$u->email}}" placeholder="Enter email here" >
                                    @if($errors->has('email'))
                                        <span class="help-block">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
                                {{--<div class="form-group {{$errors->has('role') ? 'has-error' : ''}}">--}}
                                    {{--<label for="category">Role</label>--}}
                                    {{--<select name="role" id="role" class="form-control">--}}
                                        {{--<option value="" hidden disabled selected>Select a Role</option>--}}
                                        {{--@foreach(App\Role::all() as $r)--}}
                                            {{--<option value="{{$r->id}}">{{$r->display_name}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                    {{--@if($errors->has('role'))--}}
                                        {{--<span class="help-block">{{$errors->first('role')}}</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                                @if($u->id == Auth::id())
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                @endif
                                <div class="form-group {{$errors->has('bio') ? 'has-error' : ''}}">
                                    <label for="bio">Bio</label>
                                    <textarea class="form-control" name="bio" id="bio" cols="30" rows="10">{{$u->bio}}</textarea>
                                    @if($errors->has('bio'))
                                        <span class="help-block">{{$errors->first('bio')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="box-footer">
                                <button class="btn btn-primary btn-block" type="submit">Update my Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection


