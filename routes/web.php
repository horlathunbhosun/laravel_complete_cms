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
])->name('blog');

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


Route::prefix('user')->group(function (){
    Route::get('/signup', 'AuthenticationController@signup')->name('user.signup');
    Route::get('/signin', 'AuthenticationController@signinForm')->name('user.signin');
    Route::get('/verify', 'AuthenticationController@verifyAccount')->name('user.verify.form');
    Route::get('/forget/password', 'AuthenticationController@forgetPassword')->name('user.forget');
    Route::get('/membership', 'BlogController@membership')->name('user.membership');

    Route::post('/register', 'AuthenticationController@register')->name('user.register');
    Route::post('/verify', 'AuthenticationController@verify')->name('user.verify');
    Route::post('/login', 'AuthenticationController@loginUser')->name('user.login');
    Route::get('/payment', [\App\Http\Controllers\SubscriptionPaymentController::class,'callback']);



});


Route::prefix('user')->middleware('auth.user')->group(function (){
    Route::get('/dashboard', 'UserDashboardController@dashboard')->name('user.dashboard');
    Route::post('/membership', 'SubscriptionPaymentController@store')->name('user.subscription');

    Route::patch('/profile', 'AuthenticationController@updateUser')->name('user.profile.update');

});

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
Route::resource('/backend/users', 'Backend\UsersController');


Route::resource('/backend/payment/plans', 'Backend\PaymentPlanController');

Route::get('/backend/users/confirm/{users}', [
    'uses' => 'Backend\UsersController@confirm',
    'as' => 'backend.user.confirm'
]);





