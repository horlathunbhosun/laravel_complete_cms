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

use App\Http\Controllers\BookController;

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

Route::post('/frontend/add-to-library/{book}', [\App\Http\Controllers\BookController::class,'addToLibrary']);

Route::get('/frontend/view-book/{book}', [\App\Http\Controllers\BookController::class,'viewBook'])->name('view.book.frontend');
// Route::post('/add-to-library/{book}', [\App\Http\Controllers\BookController::class,'addToLibrary']);
Route::get('/frontend/book/{book}/chapter/{chapter}', [\App\Http\Controllers\BookController::class,'viewChapter'])->name('view.chapter.frontend');


Route::get('/add-book', [\App\Http\Controllers\BookController::class,'create'])->name('create.book');
Route::post('/add_book', [\App\Http\Controllers\BookController::class,'addBook'])->name('add.book');
Route::get('/books', [\App\Http\Controllers\BookController::class,'index'])->name('view.books');
Route::get('/book/{book}', [\App\Http\Controllers\BookController::class,'editBook'])->name('edit.books');
Route::get('/view-book/{book}', [\App\Http\Controllers\BookController::class,'showBook'])->name('view.single.book.');
Route::put('/books/{book}', [\App\Http\Controllers\BookController::class,'updateBook'])->name('update.book');
Route::delete('book/{book}', [\App\Http\Controllers\BookController::class,'delete'])->name('delete.book');

Route::get('/book/{book}/add-chapter', [\App\Http\Controllers\ChapterController::class,'createChapter'])->name('create.chapter');
Route::post('/book/{book}/add_chapter', [\App\Http\Controllers\ChapterController::class,'addChapter'])->name('add.chapter');
Route::get('/view-chapter/{chapter}', [\App\Http\Controllers\ChapterController::class,'editChapter'])->name('edit.chapter');
Route::put('/update-chapter/{chapter}', [\App\Http\Controllers\ChapterController::class,'updateChapter'])->name('update.chapter');
Route::delete('/book/{book}/chapter/{chapter}', [\App\Http\Controllers\ChapterController::class,'deleteChapter'])->name('delete.chapter');

