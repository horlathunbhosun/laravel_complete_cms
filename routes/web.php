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

Route::get('/',  [
        'uses' => 'BlogController@index',
        'as' => 'blog'
]);

Route::get('/show', 'PostController@show');


Route::get('/blog/{slug}', [
    'uses' => 'BlogController@show',
    'as' => 'frontend.blog.show'
]);

Route::get('/category/{category}', [
    'uses' =>  'BlogController@category',
    'as' => 'category'
]);

Route::get('/author/{author}', [
    'uses' => 'BlogController@author',
    'as' => 'author'
]);



Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');

Route::put('/backend/blog/restore/{id}', 'Backend\BlogController@restore');

Route::delete('/backend/blog/forceDestory/{id}', 'Backend\BlogController@forceDestroy');

Route::get('/backend/blog/trash',[
  'uses' => 'Backend\BlogController@getTrashed',
  'as' => 'blog.trash'
]);

Route::resource('/backend/blog', 'Backend\BlogController');
Route::resource('/backend/categories', 'Backend\CategoriesController');


