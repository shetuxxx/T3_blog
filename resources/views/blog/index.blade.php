@extends('layouts.main')
 @section('content')

     <div class="container">
         <div class="row">
             <div class="col-md-8">
                @if($posts->count() == 0)
                    <div class="alert alert-warning text-center">
                        <p>No Post Found</p>
                    </div>
                @else
                    @if(isset($catName))
                        <div class="alert alert-info text-center">
                            <p>Category: <strong>{{$catName}}</strong></p>
                        </div>
                    @endif
                    @if(isset($userName))
                        <div class="alert alert-info text-center">
                            <p>All Posts from user: <strong>{{$userName}}</strong></p>
                        </div>
                    @endif
                    @foreach($posts as $p)
                         <article class="post-item">
                             <div class="post-item-image">
                                 <a href="{{route('post.show', ['slug' => $p->slug])}}">
                                     <img src="{{asset($p->image)}}" alt="Image error" height="400">
                                 </a>
                             </div>
                             <div class="post-item-body">
                                 <div class="padding-10">
                                     <h2><a href="{{route('post.show', ['slug' => $p->slug])}}">{{$p->title}}</a></h2>
                                     {{--<p>{{$p->excerpt}}</p>--}}
                                     <p>{!! Markdown::convertToHtml(e($p->excerpt)) !!}</p>
                                 </div>

                                 <div class="post-meta padding-10 clearfix">
                                     <div class="pull-left">
                                         <ul class="post-meta-group">
                                             <li><i class="fa fa-user"></i><a href="{{route('author', ['name' => $p->user->slug])}}">{{$p->user->name}}</a></li>
                                             <li><i class="fa fa-clock-o"></i><time>{{$p->updated_at->diffforHumans()}}</time></li>
                                             <li><i class="fa fa-tags"></i><a href="{{route('category', ['slug' => $p->category->slug])}}"> {{$p->category->title}}</a></li>
                                             <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                         </ul>
                                     </div>
                                     <div class="pull-right">
                                         <a href="{{route('post.show', ['slug' => $p->slug])}}">Continue Reading &raquo;</a>
                                     </div>
                                 </div>
                             </div>
                         </article>
                    @endforeach
                 @endif

                <nav class="text-center">
                     {{--<ul class="pager">--}}
                         {{--<li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Newer</a></li>--}}
                         {{--<li class="next"><a href="#">Older <span aria-hidden="true">&rarr;</span></a></li>--}}
                     {{--</ul>--}}
                    {{$posts->links()}}
                 </nav>
             </div>

             @include('includes.sidebar')

         </div>
     </div>

 @stop