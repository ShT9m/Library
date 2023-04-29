<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('index');

    #AUTHOR
    Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create');
    Route::post('/author/store', [AuthorController::class, 'store'])->name('author.store');
    Route::get('/author/{id}/edit', [AuthorController::class, 'edit'])
    ->name('author.edit');
    Route::patch('/author/{id}/update',[AuthorController::class, 'update'])
    ->name('author.update');
    Route::delete('/author/{id}/destroy', [AuthorController::class, 'destroy'])
    ->name('author.destroy');

    #BOOK
    Route::get('/book/{id}/show', [BookController::class, 'show'])
    ->name('book.show');
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
    Route::get('/book/{id}/edit', [BookController::class, 'edit'])
    ->name('book.edit');
    Route::patch('/book/{id}/update',[BookController::class, 'update'])
    ->name('book.update');
    Route::delete('/book/{id}/destroy', [BookController::class, 'destroy'])
    ->name('book.destroy');
});
