<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('user', App\Http\Controllers\UserController::class);

Route::resource('groupe', App\Http\Controllers\groupeController::class);

Route::resource('artiste', App\Http\Controllers\artisteController::class);

Route::resource('album', App\Http\Controllers\albumController::class);

Route::resource('musique', App\Http\Controllers\musiqueController::class);

Route::resource('genre', App\Http\Controllers\genreController::class);

Route::resource('playlist', App\Http\Controllers\playlistController::class);

Route::resource('tag', App\Http\Controllers\tagController::class);

Route::resource('annotation', App\Http\Controllers\annotationController::class);

Route::resource('annotable', App\Http\Controllers\annotableController::class);


