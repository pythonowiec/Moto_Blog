<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [PostsController::class, 'index'])->name('home');

Auth::routes();
Route::get('/dodaj_post', [PostsController::class, 'create'])->name('add');
Route::post('/add', [PostsController::class, 'store']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
