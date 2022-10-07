<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;

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

Route::get('/', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('add', [PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('store', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::get('edit/{id}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::post('update/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
Route::post('delete/{id}', [PegawaiController::class, 'delete'])->name('pegawai.delete');
