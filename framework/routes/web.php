<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeerController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BrewersController;
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

Route::get('/beers', [BeerController::class, 'index'])->name('beersIndex');
Route::get('/beer/{id}', [BeerController::class, 'details'])->name('beerDetails');

Route::get('/categories', [CategoriesController::class, 'index'])->name('categoriesIndex');
Route::get('/category/{id}', [CategoriesController::class, 'details'])->name('categoryDetails');

Route::get('/brewers', [BrewersController::class, 'index'])->name('brewersIndex');
Route::get('/brewer/{id}', [BrewersController::class, 'details'])->name('brewerDetails');
