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
Route::post('/groupe/addArtiste/{groupe}', [App\Http\Controllers\groupeController::class, 'addArtiste'])->name('groupe.addArtiste');
Route::post('/groupe/addAlbum/{groupe}', [App\Http\Controllers\groupeController::class, 'addAlbum'])->name('groupe.addAlbum');

Route::resource('artiste', App\Http\Controllers\artisteController::class);
Route::post('/artiste/addGroupe/{artiste}', [App\Http\Controllers\artisteController::class, 'addGroupe'])->name('artiste.addGroupe');
Route::post('/artiste/addAlbum/{artiste}', [App\Http\Controllers\artisteController::class, 'addAlbum'])->name('artiste.addAlbum');

Route::resource('album', App\Http\Controllers\albumController::class);
Route::post('/album/addArtiste/{album}', [App\Http\Controllers\albumController::class, 'addArtiste'])->name('album.addArtiste');
Route::post('/album/addMusique/{album}', [App\Http\Controllers\albumController::class, 'addMusique'])->name('album.addMusique');

Route::resource('musique', App\Http\Controllers\musiqueController::class);
Route::post('/musique/addArtiste/{musique}', [App\Http\Controllers\musiqueController::class, 'addArtiste'])->name('musique.addArtiste');
Route::post('/musique/addAlbum/{musique}', [App\Http\Controllers\musiqueController::class, 'addAlbum'])->name('musique.addAlbum');
Route::post('/musique/addToPlaylist/{musique}', [App\Http\Controllers\musiqueController::class, 'addToPlaylist'])->name('musique.addToPlaylist');

Route::resource('genre', App\Http\Controllers\genreController::class);

Route::resource('playlist', App\Http\Controllers\playlistController::class);

Route::resource('tag', App\Http\Controllers\tagController::class);

Route::resource('annotation', App\Http\Controllers\annotationController::class);

Route::resource('annotable', App\Http\Controllers\annotableController::class);


