<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminUserController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardPostController;

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

//home
Route::get('/', function () {
    return view('home',[
        "name" => "iyunkz",
        "title" => "Home",
        'active' => "home",
    ]);
});

//about
Route::get('/about', function () {
    return view('about',
    [
        "title" => "About",
        'active' => "about",
        "email" => "iyunkmaulana132@gmail.com",
        'image' => 'yuuka.jpg'
    ]);
});

//blog/post
Route::get('/posts', [PostController::class,'index']);
Route::get('posts/{post:slug}',[PostController::class, 'show']);

//tampil categories
Route::get('/categories',function(){
    return view('categories',[
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});


//tampil dashboard
Route::get('/dashboard', function(){
    return view('dashboard.index');
}
)->middleware('auth');

//login
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//slug buat create
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

//dashboard
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

//categories
Route::resource('dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

//categories
Route::resource('dashboard/user', AdminUserController::class)->except('show')->middleware('admin');
