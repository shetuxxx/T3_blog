<?php

namespace App\Providers;

use App\Post;
use Illuminate\Support\ServiceProvider;
use App\Category;

class IncludesViewProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('includes.sidebar', function ($view){
            $categories = Category::with('posts')->orderBy('title', 'asc')->get();
            return $view->with('categories', $categories);
        });
        view()->composer('includes.sidebar', function ($view){
            $popularPosts = Post::orderBy('view_count', 'desc')->take(3)->get();
            return $view->with('popularPosts', $popularPosts);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
