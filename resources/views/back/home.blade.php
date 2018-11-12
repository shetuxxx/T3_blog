@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                All Posts
            </h1>
            <ol class="breadcrumb pull-right">
                <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{route('index')}}">Blog</a>
                </li>
                <li class="active">All Posts</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="pull-left">
                                <a href="{{route('post.create')}}" class="btn btn-primary">Create new Post</a>
                            </div>
                            <div class="pull-right" style="padding: 7px 0;">
                                <a href="{{route('post.trashed')}}"><i class="fa fa-trash"></i> Trashed Post</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @elseif(session('trash'))
                                <div class="alert alert-warning">
                                    <?php list($m, $id) = session('trash')  ?>
                                    {{$m}}<br>
                                    <a href="{{route('post.restore', ['id' => $id])}}" class="btn btn-primary" style="text-decoration: none;"><i class="fa fa-undo"></i> Undo</a>
                                </div>
                            @endif
                            @if($posts->count() == 0)
                                <div class="alert alert-danger">
                                    <strong>No Post to Show</strong>
                                </div>
                            @else
                                <table class="table table-bordered table-condesed">
                                    <thead>
                                        <tr>
                                            <th width="80">Action</th>
                                            <th>Title</th>
                                            <th width="120">Author</th>
                                            <th width="120">Category</th>
                                            <th width="120">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($posts as $p)
                                            <tr>
                                                <td width="80">
                                                    @if(c_u_p(request(), "BlogController@edit", $p->slug))
                                                        <a href="{{route('post.edit', ['slug' => $p->slug])}}" title="Edit" class="btn btn-xs btn-default edit-row">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    @else
                                                        <a href="" class="btn btn-xs btn-default edit-row" disabled="">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    @endif
                                                    @if(c_u_p(request(), "BlogController@destroy", $p->slug))
                                                        <a href="{{route('post.delete', ['slug' => $p->slug])}}" title="Delete" class="btn btn-xs btn-danger delete-row">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    @else
                                                        <a href="" class="btn btn-xs btn-danger delete-row" disabled>
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td><a href="{{route('post.show', ['slug' => $p->slug])}}">{{$p->title}}</a></td>
                                                <td><a href="{{route('author', ['slug' => $p->user->slug])}}">{{$p->user->name}}</a></td>
                                                <td><a href="{{route('category', ['slug' => $p->category->slug])}}">{{$p->category->title}}</a></td>
                                                <td>{{$p->created_at}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer  clearfix">
                            <div class="pull-left">
                                {{$posts->links()}}
                            </div>
                            {{--shows total posts in current page--}}
                            {{--to see total post no, we need to pass that $ from controller--}}
                            <div class="pull-right">
                                <?php $pc = $posts->count() ?>
                                <small>{{$pc}} {{str_plural('Post', $pc)}}</small>
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