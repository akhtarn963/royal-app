<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('post-login', [LoginController::class, 'postLogin'])->name('login.post');
// authors
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/authors/add', [AuthorController::class, 'add'])->name('author.add');
Route::post('/authors/post', [AuthorController::class, 'post'])->name('post.author');
Route::get('/authors/edit/{id}', [AuthorController::class, 'edit'])->name('author.edit');
Route::post('/authors/update/{id}', [AuthorController::class, 'update'])->name('update.author');
Route::get('/authors/delete/{id}', [AuthorController::class, 'delete'])->name('author.delete');
Route::get('/authors/view/{id}', [AuthorController::class, 'view'])->name('author.view');
Route::get('/authors/book/delete/{author_id}/{id}', [AuthorController::class, 'delete_book'])->name('author.book.delete');

Route::get('/books', [BooksController::class, 'index'])->name('books.index');
Route::get('/book/add', [BooksController::class, 'add'])->name('books.add');
Route::post('/book/post', [BooksController::class, 'post'])->name('books.post');
Route::get('/book/edit/{id}', [BooksController::class, 'edit'])->name('books.edit');
Route::post('/book/update/{id}', [BooksController::class, 'update'])->name('books.update');
Route::get('/book/deleted/{id}', [BooksController::class, 'delete'])->name('books.delete');
Route::get('/logout', [LoginController::class, 'logout']);