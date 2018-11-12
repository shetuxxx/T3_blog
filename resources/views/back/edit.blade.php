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
            <h1>Edit the Post</h1>
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
                <li class="active">Edit Post</li>
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
                <form role="form" action="{{route('post.update', ['id' => $post->id])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="col-xs-9">
                        <div class="box">
                            <div class="box-body">
                                <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}" placeholder="Enter Title here" >
                                    @if($errors->has('title'))
                                        <span class="help-block">{{$errors->first('title')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('excerpt') ? 'has-error' : ''}}">
                                    <label for="body">Excerpt</label>
                                    <textarea name="excerpt" id="excerpt" rows="1" class="form-control">{{$post->excerpt}}</textarea>
                                    @if($errors->has('excerpt'))
                                        <span class="help-block">{{$errors->first('excerpt')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('body') ? 'has-error' : ''}}">
                                    <label for="body">Body</label>
                                    <textarea name="body" id="body" rows="10" class="form-control">{{$post->body}}</textarea>
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
                                            <img src="{{asset($post->image)}}" alt="https://via.placeholder.com/200x150?text=No+Image">
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
                        <button class="btn btn-primary btn-block" type="submit">Edit the Post</button>
                    </div>
                </form>

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
