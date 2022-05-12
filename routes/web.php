<?php


use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;

// use App\Models\Post; //bisa diketik manual atau klik kanan import all classes
// use App\Models\User;
// use digunakan untuk menghubungkan routes ke model
//1 sintaks untuk 1 model
//untuk import all classes install dulu extension php namespace resolver
//jika greyout berarti model/controller tidak digunakan atau tidak ada

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

Route::get('/', [PostController::class, 'home']);

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        "title" => "Contact",
        "active" => "contact",
    ]);
});

Route::get('/blog', [PostController::class, 'index']);
Route::get('/post/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']); //store & index hanya penamaan saja
Route::get('/dashboard', function(){
            return view('dashboard.index');
        })->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/categories/categorySlug', [AdminCategoryController::class, 'categorySlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class);

//->except('show');
//except digunakan untuk membatasi akses ke url 'show'

//middleware admin adalah middleware buatan sendiri bukan bawaan laravel

// Route lama sebelum ditangani query di model POST
// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('blog', [
//         'title' => "Post by Category : $category->category_name",
//         'active' => 'categories',
//         'posts' => $category->posts->load('category','author')
//     ]);
// });

// Route lama sebelum ditangani query di model POST
// Route::get('/authors/{author:username}', function(User $author){
//     return view('blog', [
//         'title' => "Post by Author : $author->name",
//         'active' => 'categories',
//         'posts' => $author->posts->load('category','author')
//     ]);
// });

//Route::get('/post/{post}', [PostController::class, 'show']); //route dengan model binding dengan mencari ID secara default (yg merupakan unique identifier)
//Route::get('/post/{slug}', [PostController::class, 'show']); //route yang menggunakan controller tanpa route model binding


//routes yang belum menggunakan controller
//mengambil data dari blog dengan function ($slug) dan model Post dengan function find
// Route::get('/post/{slug}', function ($slug) {
    
//     return view('post', [
//         "title" => "Single Post",
//         "single_post" => Post::find($slug)
//     ]);
// });


