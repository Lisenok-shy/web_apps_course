<?php

use App\Http\Controllers\HouseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello',['title'=>'Добро пожаловать. Снова']);
});

Route::get('/house', [HouseController::class,'index'])->middleware('auth');

Route::get('/house/{id}', [HouseController::class,'show'])->middleware('auth');

Route::get('/category/{id}', [CategoryController::class,'show'])->middleware('auth');

Route::get('/contract/create', [ContractController::class, 'create'])->middleware('auth');

Route::get('/contract', [ContractController::class, 'index'])->middleware('auth');

Route::post('/contract', [ContractController::class, 'store'])->middleware('auth');

Route::get('/contract/edit/{id}', [ContractController::class, 'confirm'])->middleware('auth');

Route::post('/contract/confirm/{id}', [ContractController::class, 'update_confirmed'])->middleware('auth');

Route::get('/contract/delete/{id}', [ContractController::class, 'destroy'])->middleware('auth');

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::post('/auth', [LoginController::class, 'authenticate']);

Route::get('/error', function() {return view('error',['message'=>session('message')]);});