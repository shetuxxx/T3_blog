@extends('layouts.admin')

@section('links')
    <link rel="stylesheet" href="{{asset('templetB/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('templetB/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('templetB/plugins/simple-mde/simplemde.min.css')}}">
    <link rel="stylesheet" href="{{asset('templetB/css/custom.css')}}">
@stop

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Add New Post</h1>
            <ol class="breadcrumb pull-right">
                <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{route('index')}}">Blog</a>
                </li>
                <li>
                    <a href="{{route('allPosts')}}">All Posts</a>All Posts
                </li>
                <li class="active">Create Post</li>
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
                {{--<div class="col-xs-9">--}}
                    {{--<div class="box">--}}
                        <!-- form start -->
                <form role="form" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="col-xs-9">
                        <div class="box">
                            <div class="box-body">
                                <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" placeholder="Enter Title here" >
                                    @if($errors->has('title'))
                                        <span class="help-block">{{$errors->first('title')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('excerpt') ? 'has-error' : ''}}">
                                    <label for="body">Excerpt</label>
                                    <textarea name="excerpt" id="excerpt" rows="1" class="form-control">{{old('excerpt')}}</textarea>
                                    @if($errors->has('excerpt'))
                                        <span class="help-block">{{$errors->first('excerpt')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('body') ? 'has-error' : ''}}">
                                    <label for="body">Body</label>
                                    <textarea name="body" id="body" rows="10" class="form-control">{{old('body')}}</textarea>
                                    @if($errors->has('body'))
                                        <span class="help-block">{{$errors->first('body')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box">
                            <div class="box-body">
                                <label for="category">Choose Category</label>
                                @foreach($categories as $c)
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="category" value="{{$c->id}}">
                                            {{$c->title}}
                                        </label>
                                    </div>
                                @endforeach
                                @if($errors->has('category'))
                                    <span class="help-block" style="color: red;">{{$errors->first('category')}}</span>
                                @endif
                                <hr>
                                <div class="form-group {{$errors->has('image') ? 'has-error' : ''}}">
                                    <label for="image">Image</label>
                                    {{--Jasny bootstrap--}}
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="https://via.placeholder.com/200x150?text=No+Image" alt="Image error">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                        <div>
                                            <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="image"></span>
                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                    {{----}}
                                    {{--<input type="file" name="image">--}}
                                    @if($errors->has('image'))
                                        <span class="help-block">{{$errors->first('image')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-primary btn-block" type="submit">Create New Post</button>
                    </div>
                </form>
                        <!-- form end -->
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-3">--}}
                    {{--<div class="box">--}}
                        {{--<div class="box-header with-border">--}}
                            {{--<h3 class="box-title">Category</h3>--}}
                        {{--</div>--}}
                        {{--<div class="box-body">--}}
                            {{--@foreach($categories as $c)--}}
                                {{--<div class="radio">--}}
                                    {{--<label>--}}
                                        {{--<input type="radio" name="category" value="{{$c->id}}">--}}
                                        {{--{{$c->title}}--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="box">--}}
                        {{--<div class="box-header with-border">--}}
                            {{--<h3 class="box-title">Publish</h3>--}}
                        {{--</div>--}}
                        {{--<div class="box-body">--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="published_at">Publish date</label>--}}
                                {{--<input type="text" class="form-control">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="box-footer clearfix">--}}
                            {{--<div class="pull-left">--}}
                                {{--<a href="#" class="btn btn-default">Save Draft</a>--}}
                            {{--</div>--}}
                            {{--<div class="pull-right">--}}
                                {{--<a href="#" class="btn btn-primary">Publish</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="box">--}}
                        {{--<div class="box-header with-border">--}}
                            {{--<h3 class="box-title">Feature Image</h3>--}}
                        {{--</div>--}}
                        {{--<div class="box-body text-center">--}}
                            {{--<div class="fileinput fileinput-new" data-provides="fileinput">--}}
                                {{--<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">--}}
                                    {{--<img src="http://placehold.it/200x200" width="100%" alt="...">--}}
                                {{--</div>--}}
                                {{--<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>--}}
                                {{--<div>--}}
                            {{--<span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>--}}
                            {{--<input type="file" name="...">--}}
                            {{--</span>--}}
                                    {{--<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>




@endsection

@section('script')
    <script src="{{asset('templetB/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js')}}"></script>
    <script src="{{asset('templetB/plugins/simple-mde/simplemde.min.js')}}"></script>
    <script src="{{asset('templetB/js/custom.js')}}"></script>
    <script>
        var simplemde1 = new SimpleMDE({ element: $("#excerpt")[0] });
        var simplemde2 = new SimpleMDE({ element: $("#body")[0] });
    </script>
@stop


{{--<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">--}}
{{--{{csrf_field()}}--}}
{{--<div class="form-group">--}}
    {{--<label for="title">Title</label>--}}
    {{--<input type="text" class="form-control" name="title" value="{{old('title')}}>--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
    {{--<label for="content">Content</label>--}}
    {{--<textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>--}}
{{--</div>--}}


{{--<div class="form-group">--}}
    {{--<div class="text-center">--}}
        {{--<button class="btn btn-primary" type="submit">Create</button>--}}
    {{--</div>--}}
{{--</div>--}}
{{--</form>--}}