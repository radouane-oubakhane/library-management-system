<?php

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

// Books
Route::get('/books', [BookController::class, 'index'])->name('books.index');
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
