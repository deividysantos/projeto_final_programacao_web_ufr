<?php

use App\Http\Controllers\BookController;
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

Route::get('/', [BookController::class, 'getListAllBooks'])->name('view.index');
Route::get('/newBook', [BookController::class, 'getFormNewBook'])->name('view.create');
Route::get('/edit/{id}', [BookController::class, 'getFormEditBook'])->name('view.edit');
Route::get('delete/{id}', [BookController::class, 'postDelete'])->name('delete');

Route::post('/newBookPost', [BookController::class, 'postCreateNewBook'])->name('create');
Route::post('/editPost', [BookController::class, 'postEditBook'])->name('edit');
