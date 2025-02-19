<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\KomenController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RegisterController;

Route::get('/', [PublicController::class, 'landing'])->name('landing');

Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [PublicController::class, 'home'])->name('home');
    Route::get('/profile', [PublicController::class, 'profile'])->name('profile');
    Route::get('/notifikasi', [PublicController::class, 'notif'])->name('notif');

    Route::get('/album', [AlbumController::class, 'album'])->name('album');
    Route::get('/new-album', [AlbumController::class, 'NewAlbum'])->name('NewAlbum');
    Route::post('/add-album', [AlbumController::class, 'AddAlbum'])->name('AddAlbum');

    Route::get('/my-galery', [GaleryController::class, 'Galery'])->name('galery');
    Route::get('/my-galery-new', [GaleryController::class, 'NewGalery'])->name('NewGalery');
    Route::post('/my-galery-new-add', [GaleryController::class, 'AddGalery'])->name('AddGalery');
    Route::get('/download/{id}', [GaleryController::class, 'downloadFoto'])->name('downloadFoto');
    Route::get('/foto/{id}', [GaleryController::class, 'detailFoto'])->name('detail-foto');

    Route::post('/komentar-add/{foto_id}', [KomenController::class, 'komentar'])->name('komentar');
    Route::post('/foto/komentar', [KomenController::class, 'komentar'])->name('komentar.store');

    Route::post('/like/{foto_id}', [LikeController::class, 'like'])->name('like');
});
