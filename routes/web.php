<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DepartementController;
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


Route::get('/departement', [DepartementController::class, 'index'])->name('departement.index');
Route::get('departement/add', [DepartementController::class, 'create'])->name('departement.create');
Route::post('departement/store', [DepartementController::class, 'store'])->name('departement.store');
Route::get('departement/edit/{id}', [DepartementController::class, 'edit'])->name('departement.edit');
Route::post('departement/update/{id}', [DepartementController::class, 'update'])->name('departement.update');
Route::post('departement/delete/{id}', [DepartementController::class, 'delete'])->name('departement.delete');
