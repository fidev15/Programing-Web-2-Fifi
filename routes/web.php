<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Authenticate;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('list-mahasiswa');
Route::get('/create', [MahasiswaController::class, 'create'])->name('tambah-mahasiswa');
Route::post('/store', [MahasiswaController::class, 'store'])->name('simpan-mahasiswa');
Route::get('/edit/{mahasiswa}', [MahasiswaController::class, 'edit'])->name('edit-mahasiswa');
Route::put('/update/{mahasiswa}', [MahasiswaController::class, 'update'])->name('update-mahasiswa');
Route::delete('/delete/{mahasiswa}', [MahasiswaController::class, 'delete'])->name(('hapus-mahasiswa'));

