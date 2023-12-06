<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookCopy;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Members
Route::get('/members', [MemberController::class, 'index'])->name('members.index');
Route::get('/member/{id}', [MemberController::class, 'show'])->name('members.index');
// Inscriptions
//Route::get('/inscriptions', [InscriptionController::class, 'index'])->name('inscriptions.index');
// BookReserve
Route::get('/bookreserve', [BookCopy::class, 'index'])->name('books reserve.index');
// Create Inscription
//Route::get('/inscriptions/create', [InscriptionController::class, 'create'])->name('inscriptions.create');
// Store Inscription
//Route::post('/inscriptions', [InscriptionController::class, 'store'])->name('inscriptions.store');


Route::prefix('inscriptions')->group(function () {
    Route::get('/', [InscriptionController::class, 'index'])->name('inscriptions.index');
    Route::get('/create', [InscriptionController::class, 'create'])->name('inscriptions.create');
    Route::post('/', [InscriptionController::class, 'store'])->name('inscriptions.store');
});


//Auteur
Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');

Route::prefix('book-categories')->group(function () {
    Route::get('/', [BookCategoryController::class, 'index'])->name('book-categories.index');
    Route::get('/create', [BookCategoryController::class, 'create'])->name('book-categories.create');
    Route::post('/', [BookCategoryController::class, 'store'])->name('book-categories.store');
});

Route::prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('books.index');
    Route::get('/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/', [BookController::class, 'store'])->name('books.store');
    Route::get('/{id}', [BookController::class, 'show'])->name('books.show');
    Route::get('/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
});


Route::prefix('members')->group(function () {
    Route::get('/', [MemberController::class, 'index'])->name('members.index');
    Route::get('/create', [MemberController::class, 'create'])->name('members.create');
    Route::post('/', [MemberController::class, 'store'])->name('members.store');
    Route::get('/{id}', [MemberController::class, 'show'])->name('members.show');
    Route::get('/{id}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::post('/{id}/edit', [MemberController::class, 'update'])->name('members.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
