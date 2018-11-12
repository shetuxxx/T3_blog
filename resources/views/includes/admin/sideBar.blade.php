<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('templetB/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pencil"></i>
                    <span>Blog</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('allPosts')}}"><i class="fa fa-circle-o"></i> All Posts</a></li>
                    <li><a href="{{route('post.create')}}"><i class="fa fa-circle-o"></i> Add New</a></li>
                </ul>
            </li>
            @if(c_u_p(request(), "CategoryController@index"))
                <li><a href="{{route('allCategories')}}"><i class="fa fa-folder"></i> <span>Categories</span></a></li>
            @endif
            @if(c_u_p(request(), "UserController@index"))
                <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i> <span>Users</span></a></li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
