<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\RedirectResponse;

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
Route::get('/dodaj_post', [PostsController::class, 'create'])->name('add')->middleware('auth');
Route::post('/add', [PostsController::class, 'store']);

Route::get('/autor', function () {
    return view('author');
})->name('author');

Route::get('/o_blogu', function () {
    return view('info');
})->name('info');

Route::get('/{id}', [PostsController::class, 'show']);
Route::post('/add_c', [PostsController::class, 'add'])->name('add_comment')->middleware('auth');

Route::get('/home', [HomeController::class, 'index']);
Route::post('/search', [PostsController::class, 'search']);

Route::get('/test', function () {
    Storage::disk('google')->put('test.txt', 'Hello World');
});
