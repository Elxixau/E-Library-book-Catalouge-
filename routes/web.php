<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoadingController;
use App\Models\KategoriBuku;
use App\Models\Buku;

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



Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/tentangKami', [HomeController::class, 'tentangKami'])->name('tentangKami');
Route::get('/tentangKami/selengkapnya', [HomeController::class, 'more'])->name('more');
Route::get('/buku', [HomeController::class, 'search'])->name('search');
Route::get('/kategori/{kategori}', [HomeController::class, 'show'])->name('kategori.show');
Route::get('/loading',  [LoadingController::class, 'index'])->name('loading');



Route::get('/login', [SessionController::class, 'index'])->name('logIn');
Route::post('/login/authentication', [SessionController::class, 'login']);
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');
Route::get('/register', [SessionController::class, 'reg'])->name('register');
Route::post('/register/authentication', [SessionController::class, 'Register']);

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/admin/anggota', [AdminController::class, 'anggota'])->name('anggota');
        Route::get('/admin/anggota/cetak-pdf', [AdminController::class, 'cetakPDF'])->name('cetak.anggota');
        Route::get('/admin/anggota/{id}/edit', [AdminController::class, 'editAnggota'])->name('edit.anggota');
        Route::delete('/admin/anggota/{id}', [AdminController::class, 'deleteAnggota'])->name('hapus.anggota');
        Route::put('/admin/anggota/{id}', [AdminController::class, 'updateAnggota'])->name('update.anggota');
        Route::get('/admin/anggota/filter', [AdminController::class, 'filter'])->name('filter.anggota');
    });
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/buku', [AdminController::class, 'buku'])->name('buku');
    Route::get('/admin/profil', [AdminController::class, 'profil'])->name('profil');
    Route::put('/admin/profil/edit', [AdminController::class, 'updateProfil'])->name('update.profil');
    Route::get('/admin/buku/create', [BukuController::class, 'create'])->name('upload');
    Route::get('/admin/buku/{id}/update', [BukuController::class, 'edit'])->name('edit');
    Route::post('/admin/buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/admin/buku/cetak-pdf', [BukuController::class, 'cetakPDF'])->name('cetak.buku');
    Route::put('/admin/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('/admin/buku/{id}', [BukuController::class, 'destroy'])->name('buku.delete');
    Route::get('/admin/buku/filter', [BukuController::class, 'filter'])->name('filter.buku');
});

Route::get('/download/{id}', [BukuController::class,'download'])->name('book.download');







