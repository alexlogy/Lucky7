<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\reviewLimitController;
use App\Http\Controllers\CommentController;

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
Route::get('/viewReviews', [ReviewController::class, 'viewReviews'])->name('viewReviews');
Route::post('/rateReview/{id}', [ReviewController::class, 'rateReview'])->name('rateReview');
Route::get('/addComment', [CommentController::class, 'addComment'])->name('addComment');
Route::put('/accept/{id}', [\App\Http\Controllers\ConferenceChairReviewController::class, 'accept'])->name('accept');
Route::put('/decline/{id}', [\App\Http\Controllers\ConferenceChairReviewController::class, 'decline'])->name('decline');
Route::put('/email/{id}', [\App\Http\Controllers\MailController::class, 'email'])->name('email');

Route::resource('cc_review', \App\Http\Controllers\ConferenceChairReviewController::class);
Route::resource('cc_bid', \App\Http\Controllers\ConferenceChairBidController::class);
Route::resource('review', \App\Http\Controllers\ReviewController::class);
Route::resource('paper', \App\Http\Controllers\PaperController::class);
Route::resource('bid', \App\Http\Controllers\BidController::class);
Route::resource('comment', \App\Http\Controllers\CommentController::class);
Route::resource('submission', \App\Http\Controllers\SubmissionController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
