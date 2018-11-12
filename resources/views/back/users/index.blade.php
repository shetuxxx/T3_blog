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
                <li class="active">All users</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="pull-left">
                                <a href="{{route('users.create')}}" class="btn btn-primary">Create new User</a>
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
                            <table class="table table-bordered table-condesed">
                                <thead>
                                <tr>
                                    <th width="80">Edit</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Bio</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $u)
                                    <tr>
                                        <td width="80">
                                            <a href="{{route('users.edit', ['id' => $u->id])}}" title="Edit" class="btn btn-xs btn-default edit-row">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td><a href="{{route('author', ['slug' => $u->slug])}}">{{$u->name}}</a></td>
                                        <td>{{$u->email}}</td>
                                        <td>
                                            {{$u->roles()->first()->display_name}}
                                        </td>
                                        <td>{{$u->bio}}</td>
                                        <td>
                                            @if($u->id !== Auth::id())
                                                <form role="form" action="{{route('users.destroy', ['id' => $u->id])}}" method="post">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button class="btn btn-xs btn-danger delete-row" type="submit"><i class="fa fa-times"></i></button>
                                                </form>
                                            @else
                                                <button class="btn btn-xs btn-danger delete-row" disabled><i class="fa fa-times"></i></button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer  clearfix">
                            <div class="pull-left">
                                {{$users->links()}}
                            </div>
                            {{--shows total posts in current page--}}
                            {{--to see total post no, we need to pass that $ from controller--}}
                            <div class="pull-right">
                                <small>{{$users->count()}} {{str_plural('User', $users->count())}}</small>
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