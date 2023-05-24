<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;


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

Route::get('/', [LandingController::class, 'index'])->name('landing');

//latihan 23
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');

Route::get('/role', [RoleController::class, 'index'])->name('role.index');



// latihan 22
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/tambahUser', [UserController::class, 'create'])->name('user.create');
Route::get('/user/editUser', [UserController::class, 'edit'])->name('user.edit');
Route::get('/user/detail/{id}', [UserController::class, 'detail'])->name('user.detail');
Route::post('/user', [UserController::class, 'store'])->name('user.store');







// Route::get('/user/tableUser', [UserController::class, 'show'])->name('user.show');
// Route::get('/user/tableUser', [UserController::class, 'show']);

// Route::get('/user', [UserController::class, 'index']);
// Route::get('/tableUser', [UserController::class, 'index'])->name('tableUser');
// // Route::post('/user', [UserController::class, 'store'])->name('user.store');
// Route::post('/user', 'UserController@store')->name('user.store');
// Route::delete('/tableUser/{id}', [UserController::class, 'destroy'])->name('tableUser.destroy');
