<?php


use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home.index');
})->name('home.index');

// Route::get('/home', function() {
//     return view('home.index');
// })->name('home.index');

Route::get('/product', [ProductController::class,'index'])->name('product.index');
Route::get('/product/create', [ProductController::class,'create'])->name('product.create');
Route::post('/product/store', [ProductController::class,'store'])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
Route::put('/product/update/{id}', [ProductController::class,'update'])->name('product.update');
Route::post('/product/destroy/{id}', [ProductController::class,'destroy'])->name('product.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post',[PostController::class,'index'])->name('post.index');
Route::get('/post/create',[PostController::class,'create'])->name('post.create');
Route::post('/post/store',[PostController::class,'store'])->name('post.store');
Route::get('/post/edit/{id}', [PostController::class,'edit'])->name('post.edit');
Route::put('/post/update/{id}', [PostController::class,'update'])->name('post.update');
Route::post('/post/destroy/{id}', [PostController::class,'destroy'])->name('post.destroy');

