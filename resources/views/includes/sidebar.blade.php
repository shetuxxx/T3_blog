<div class="col-md-4">
    <aside class="right-sidebar">
        {{--<div class="search-widget">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" class="form-control input-lg" placeholder="Search for...">--}}
                {{--<span class="input-group-btn">--}}
                            {{--<button class="btn btn-lg btn-default" type="button">--}}
                                {{--<i class="fa fa-search"></i>--}}
                            {{--</button>--}}
                          {{--</span>--}}
            {{--</div><!-- /input-group -->--}}
        {{--</div>--}}

        <div class="widget">
            <div class="widget-heading">
                <h4>Categories</h4>
            </div>
            <div class="widget-body">
                <ul class="categories">
                    @foreach($categories as $c )
                        <li>
                            <a href="{{route('category', ['slug' => $c->slug])}}"><i class="fa fa-angle-right"></i>{{$c->title}}</a>
                            <span class="badge pull-right">{{$c->posts->count()}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Popular Posts</h4>
            </div>
            <div class="widget-body">
                <ul class="popular-posts">
                    @foreach($popularPosts as $p)
                        <li>
                            <div class="post-image">
                                <a href="{{route('post.show', ['slug' => $p->slug])}}">
                                    <img src="https://picsum.photos/200/300/?random" alt="Image error" height="60">
                                </a>
                            </div>
                            <div class="post-body">
                                <h6><a href="{{route('post.show', ['slug' => $p->slug])}}">{{$p->title}}</a></h6>
                                <div class="post-meta">
                                    <span>{{$p->updated_at->diffforHumans()}}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{--<div class="widget">--}}
            {{--<div class="widget-heading">--}}
                {{--<h4>Tags</h4>--}}
            {{--</div>--}}
            {{--<div class="widget-body">--}}
                {{--<ul class="tags">--}}
                    {{--<li><a href="#">PHP</a></li>--}}
                    {{--<li><a href="#">Codeigniter</a></li>--}}
                    {{--<li><a href="#">Yii</a></li>--}}
                    {{--<li><a href="#">Laravel</a></li>--}}
                    {{--<li><a href="#">Ruby on Rails</a></li>--}}
                    {{--<li><a href="#">jQuery</a></li>--}}
                    {{--<li><a href="#">Vue Js</a></li>--}}
                    {{--<li><a href="#">React Js</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    </aside>
</div>