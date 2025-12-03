<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [MahasiswaController::class, 'home']);
Route::post('/create', [MahasiswaController::class, 'create']);
Route::get('/read', [MahasiswaController::class, 'read']);
Route::get('/edit/{id}', [MahasiswaController::class, 'edit']);
Route::post('/update/{id}', [MahasiswaController::class, 'update']);
Route::get('/delete/{id}', [MahasiswaController::class, 'delete']);
