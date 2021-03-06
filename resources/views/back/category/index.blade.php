@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                All Categories
            </h1>
            <ol class="breadcrumb pull-right">
                <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{route('index')}}">Blog</a>
                </li>
                <li class="active">All Categories</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="pull-left">
                                <a href="{{route('category.create')}}" class="btn btn-primary">Create new Category</a>
                            </div>
                            {{--<div class="pull-right" style="padding: 7px 0;">--}}
                                {{--<a href="{{route('post.trashed')}}"><i class="fa fa-trash"></i> Trashed Post</a>--}}
                            {{--</div>--}}
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @endif
                            @if($cc == 0)
                                <div class="alert alert-danger">
                                    <strong>No Category to Show</strong>
                                </div>
                            @else
                                <table class="table table-bordered table-condesed">
                                    <thead>
                                    <tr>
                                        <th width="80">Action</th>
                                        <th>Title</th>
                                        <th>Posts</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $c)
                                        <tr>
                                            <td width="80">
                                                <a href="{{route('category.edit', ['slug' => $c->slug])}}" title="Edit" class="btn btn-xs btn-default edit-row">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{route('category.delete', ['slug' => $c->id])}}" title="Delete" class="btn btn-xs btn-danger delete-row">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                            <td><a href="{{route('category', ['slug' => $c->slug])}}">{{$c->title}}</a></td>
                                            <td>{{$cc}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer  clearfix">
                            <div class="pull-left">
                                {{$categories->links()}}
                            </div>
                            {{--shows total posts in current page--}}
                            {{--to see total post no, we need to pass that $ from controller--}}
                            <div class="pull-right">
                                <small>{{$cc}} {{str_plural('Category', $cc)}}</small>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection


{{--we can edit the given pagination file--}}   {{--OR--}}
{{--use javascript to change class--}}
@section('script')

    <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>

@stop