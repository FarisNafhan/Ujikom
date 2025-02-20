<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\KomenController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

Route::get('/', [PublicController::class, 'landing'])->name('landing');

Route::get('/login', [AuthController::class, 'login_form'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'register_form'])->name('registerForm');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [PublicController::class, 'home'])->name('home');
    Route::get('/download/{id}', [PublicController::class, 'download_foto'])->name('DownloadFoto');
    Route::get('/foto/{id}', [PublicController::class, 'detail_foto'])->name('DetailFoto');

    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/edit-profile', [ProfileController::class, 'edit_profile'])->name('editprofile');
    Route::put('/save-profile', [ProfileController::class, 'save_profile'])->name('saveprofile');

    Route::get('/notifikasi', [PublicController::class, 'notif'])->name('notif');

    Route::get('/album', [AlbumController::class, 'album'])->name('album');
    Route::get('/new-album', [AlbumController::class, 'new_album'])->name('NewAlbum');
    Route::get('/detail-album/{id}', [AlbumController::class, 'detail_album'])->name('DetailAlbum');

    Route::post('/add-album', [AlbumController::class, 'add_album'])->name('AddAlbum');
    Route::put('/save-album/{id}', [AlbumController::class, 'save_album'])->name('SaveAlbum');

    Route::get('/my-galery', [GaleryController::class, 'galery'])->name('Galery');
    Route::get('/my-galery-new', [GaleryController::class, 'new_galery'])->name('NewGalery');
    Route::get('/detail-galery/{id}', [GaleryController::class, 'detail_galery'])->name('DetailGalery');

    Route::post('/my-galery-new-add', [GaleryController::class, 'add_galery'])->name('AddGalery');
    Route::put('/save-galery/{id}', [GaleryController::class, 'update_galery'])->name('Update.Galery');
    Route::delete('/delete-galery/{id}', [GaleryController::class, 'delete_galery'])->name('Destroy.Galery');

    Route::post('/komentar-add/{foto_id}', [KomenController::class, 'komentar'])->name('komentar');
    Route::post('/foto/komentar', [KomenController::class, 'komentar'])->name('komentar.store');

    Route::post('/like/{foto_id}', [LikeController::class, 'like'])->name('like');
});
