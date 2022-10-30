<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrewerController;
use App\Http\Controllers\ReviewController;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('beers', BeerController::class);
Route::patch('/beers/{beer}/update_visibility', [BeerController::class, 'updateVisibility'])->name('beers.update-visibility');

Route::resource('categories', CategoryController::class);
Route::patch('/categories/{category}/update_visibility', [CategoryController::class, 'updateVisibility'])->name('categories.update-visibility');

Route::resource('brewers', BrewerController::class);
Route::patch('/brewers/{brewer}/update_visibility', [BrewerController::class, 'updateVisibility'])->name('brewers.update-visibility');

Route::resource('reviews', ReviewController::class);

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/profile/{profile}', [\App\Http\Controllers\UserController::class, 'show'])->name('profile.show');
Route::get('profile/{profile}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{profile}', [\App\Http\Controllers\UserController::class, 'update'])->name('profile.update');
Route::patch('/profile/{profile}/verify', [\App\Http\Controllers\UserController::class, 'updateVerified'])->name('profile.update-verified');

