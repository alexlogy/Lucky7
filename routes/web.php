<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\ReviewController;

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
Route::get('/', function(){
  return view('welcome');
});

/*
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
*/

//=======
Route::get('/', function(){
  return view('welcome');
});

/*
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
*/

//>>>>>>> 9ac306103851b177689e0c13ade9de12453f7867
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
//<<<<<<< HEAD
//=======

Route::resource('admin', AdminController::class);
//>>>>>>> 9ac306103851b177689e0c13ade9de12453f7867

Route::resource('review', \App\Http\Controllers\ReviewController::class);
Route::resource('paper', \App\Http\Controllers\PaperController::class);
Route::resource('bid', \App\Http\Controllers\BidController::class);
Route::resource('comment', \App\Http\Controllers\CommentController::class);
Route::resource('submission', \App\Http\Controllers\SubmissionController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
