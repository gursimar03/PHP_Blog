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
Route::get('/user', [\App\Http\Controllers\UserController::class, 'userProfile'])->name('user.profile');
Route::post('/user/update-name', [\App\Http\Controllers\UserController::class, 'updateName'])->name('user.update-name');
Route::post('/user/update-password', [\App\Http\Controllers\UserController::class, 'updatePassword'])->name('user.update-password');
Route::delete('/user/delete-account', [\App\Http\Controllers\UserController::class, 'deleteAccount'])->name('user.delete-account');



