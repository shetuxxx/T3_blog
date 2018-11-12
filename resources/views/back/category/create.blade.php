@extends('layouts.admin')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Add New Category</h1>
            <ol class="breadcrumb pull-right">
                <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{route('index')}}">Blog</a>
                </li>
                <li>
                    <a href="{{route('allCategories')}}">All Categories</a>All Posts
                </li>
                <li class="active">Create Category</li>
            </ol>
        </section>

        <!-- Main content -->
        {{--@if(count($errors) > 0)--}}
        {{--<ul class="list-group">--}}
        {{--@foreach($errors->all() as $error)--}}
        {{--<li class="list-group-item text-danger">--}}
        {{--{{$error}}--}}
        {{--</li>--}}
        {{--@endforeach--}}
        {{--</ul>--}}
        {{--@endif--}}

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
            {{--<!-- form start -->--}}
                        <form role="form" action="{{route('category.store')}}" method="post">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" placeholder="Enter Title here" >
                                    @if($errors->has('title'))
                                        <span class="help-block">{{$errors->first('title')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="box-footer">
                                <button class="btn btn-primary btn-block" type="submit">Create New Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection


