<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    return view('home');
});

Route::get('/bukus', [BukuController::class, 'index']);
Route::resource('bukus',BukuController::class);
Route::get('/kategoris', [KategoriController::class, 'index']);
Route::resource('kategoris',KategoriController::class);
Route::get('/home', [JoinController::class, 'innerJoin'])->name('home.index');
Route::get('/home/filter', [JoinController::class, 'filter'])->name('home.filter');

