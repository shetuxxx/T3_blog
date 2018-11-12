<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test', [
    'uses' => 'PostController@test'
]);


Route::get('/', [
    'uses' => 'PostController@welcome',
    'as' => 'welcome'
]);


Route::get('/b', [
    'uses' => 'PostController@index',
    'as' => 'index'
]);
Route::get('/bp/{slug}', [
    'uses' => 'PostController@show',
    'as' => 'post.show'
]);

Route::get('/category/{slug}', [
    'uses' => 'PostController@category',
    'as' => 'category'
]);

Route::get('/author/{slug}', [
    'uses' => 'PostController@sup',
    'as' => 'author'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/allPosts', [
    'uses' => 'admin\BlogController@index',
    'as' => 'allPosts'
]);

Route::get('/post/create', [
    'uses' => 'admin\BlogController@create',
    'as' => 'post.create'
]);
Route::post('/post/store', [
    'uses' => 'admin\BlogController@store',
    'as' => 'post.store'
]);

Route::get('/post/edit/{slug}', [
    'uses' => 'admin\BlogController@edit',
    'as' => 'post.edit'
]);

Route::post('/post/update/{id}', [
    'uses' => 'admin\BlogController@update',
    'as' => 'post.update'
]);

Route::get('/post/delete/{slug}', [
    'uses' => 'admin\BlogController@destroy',
    'as' => 'post.delete'
]);

Route::get('/post/trashed', [
    'uses' => 'admin\BlogController@trashed',
    'as' => 'post.trashed'
]);

Route::get('/post/restore/{id}', [
    'uses' => 'admin\BlogController@restore',
    'as' => 'post.restore'
]);

Route::get('/post/kill/{id}', [
    'uses' => 'admin\BlogController@kill',
    'as' => 'post.kill'
]);

Route::get('/allCategories', [
    'uses' => 'admin\CategoryController@index',
    'as' => 'allCategories'
]);

Route::get('/category/create/t', [
    'uses' => 'admin\CategoryController@create',
    'as' => 'category.create'
]);
Route::post('/category/store', [
    'uses' => 'admin\CategoryController@store',
    'as' => 'category.store'
]);

Route::get('/category/edit/{slug}', [
    'uses' => 'admin\CategoryController@edit',
    'as' => 'category.edit'
]);
Route::post('/category/update/{id}', [
    'uses' => 'admin\CategoryController@update',
    'as' => 'category.update'
]);

Route::get('/category/delete/{id}', [
    'uses' => 'admin\CategoryController@destroy',
    'as' => 'category.delete'
]);


Route::resource('/back/users', 'admin\UserController');


Route::get('/profile/edit/{slug}', [
    'uses' => 'HomeController@editP',
    'as' => 'profile'
]);
Route::post('/profile/update/{id}', [
    'uses' => 'HomeController@updateP',
    'as' => 'profile.update'
]);


