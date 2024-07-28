<?php

use App\Http\Controllers\Todo\TodoController;
use App\Http\Controllers\viewPage\viewPageController;
use App\Http\Controllers\Session\sessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/todo', [TodoController::class,'index'])->name('todo');
Route::post('/todo', [TodoController::class,'store'])->name('todo.post');
Route::put('/todo/{id}', [TodoController::class,'update'])->name('todo.update');
Route::delete('/todo/{id}', [TodoController::class,'destroy'])->name('todo.delete');

Route::get('/home', [viewPageController::class,'viewHome'])->name('todo.viewHome');
Route::get('/aboutUs', [viewPageController::class,'viewAboutUs'])->name('todo.viewAboutUs');
Route::get('/user', [viewPageController::class,'viewUser'])->name('todo.user');

Route::get('/loginRegister', [sessionController::class,'loginRegisterForm'])->name('todo.loginRegister');
Route::post('/session/login', [sessionController::class,'login'])->name('todo.login');
Route::get('/session/logout', [sessionController::class,'logout'])->name('todo.logout');
Route::post('/session/register', [sessionController::class,'create'])->name('todo.register');
Route::put('/session/updateUser', [sessionController::class,'update'])->name('todo.updateUser');

Route::get('/todo', [TodoController::class,'index'])->name('todo');