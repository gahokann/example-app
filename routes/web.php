<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});



Route::resource('todos', \App\Http\Controllers\TodoController::class);
//
Route::get('search', [\App\Http\Controllers\TodoController::class,'search'])->name('todos.search');
//
Route::get('todos/{todo}', [\App\Http\Controllers\TodoController::class,'destroy'])->name('todos.destory');
//

Route::resource('developer', \App\Http\Controllers\DeveloperController::class);
Route::get('developer/{dev}', [\App\Http\Controllers\DeveloperController::class,'destroy'])->name('developer.destory');
Route::post('todos/add/{id}', [\App\Http\Controllers\TodoController::class,'addDeveloper'])->name('todos.adddeveloper');



