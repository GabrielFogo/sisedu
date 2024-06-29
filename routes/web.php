<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class,'index'])->name('login');
Route::post('/login', [AuthController::class,'login'])->name('login.post');

Route::get('/registro',[RegistroController::class, 'index'])->name('registro');
Route::post('/registro',[RegistroController::class, 'store'])->name('registro.post');

Route::middleware('auth')->group(function () {
    Route::get('/listarnotas', [ProfessorController::class, 'index'])->name('listarnotas');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::middleware('professor')->group(function(){
        Route::delete('/deletar/{id}',[ProfessorController::class, 'destroy']);
    });
});


