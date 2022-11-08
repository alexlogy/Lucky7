<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\reviewLimitController;

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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

// routes
Route::resource('admin', AdminController::class);
Route::post('/changeLimit/{id}', reviewLimitController::class)->name('change');

Route::resource('review', \App\Http\Controllers\ReviewController::class);
Route::resource('paper', \App\Http\Controllers\PaperController::class);
Route::resource('bid', \App\Http\Controllers\BidController::class);
Route::resource('comment', \App\Http\Controllers\CommentController::class);
Route::resource('submission', \App\Http\Controllers\SubmissionController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
