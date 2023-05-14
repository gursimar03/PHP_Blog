<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;

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

Route::get('/', [PagesController::class, 'index']);

Route::resource('/blog', PostsController::class);

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('news/{id}', [\App\Http\Controllers\PostsController::class, 'show'])->name('blog.show');

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/postboard', [\App\Http\Controllers\AdminController::class, 'postboard'])->name('admin.postboard');

Route::get('/admin/userboard', [\App\Http\Controllers\AdminController::class, 'userboard'])->name('admin.userboard');


Route::delete('/posts/{post}', [\App\Http\Controllers\PostsController::class, 'destroy'])->name('posts.destroy');

Route::get('/user', [\App\Http\Controllers\UserController::class, 'userProfile'])->name('user.profile');
Route::post('/users/role/{id}', [\App\http\Controllers\UserController::class,'updateRole'])->name('users.role');
Route::get('/users/{id}/posts/count', [\App\Http\Controllers\UserController::class, 'getPostCount'])->name('users.posts.count');
Route::put('/users/{id}', [\App\http\Controllers\UserController::class,'update'])->name('users.update');

Route::get('/users/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

Route::post('change-password',[\App\Http\Controllers\UserController::class,'updatePass'])->name('change.password');


//search routes

Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');
Route::get('/search/tag/{tag}', [\App\Http\Controllers\SearchController::class, 'byTag'])->name('search.tag');

//comments routes

Route::post('/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [\App\Http\Controllers\CommentController::class, 'destroy'])->name('comments.destroy');

//Contact us routes
Route::get('contact-us', [\App\Http\Controllers\ContactController::class, 'index']);
Route::post('contact-us', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.us.store');



