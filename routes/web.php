<?php

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

// Route::get('/', function () {
//     return view('admin.dashboard');
// });
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login_post', [App\Http\Controllers\LoginController::class, 'authenticate']);
Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout']);

Route::get('/register', [App\Http\Controllers\registerController::class, 'index'])->middleware('guest');
Route::post('/register', [App\Http\Controllers\registerController::class, 'store']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard',[App\Http\Controllers\DashboardController::class,'index']);

    Route::get('admin/rak',[App\Http\Controllers\RakController::class,'index']);
    Route::post('admin/rak/create',[App\Http\Controllers\RakController::class,'store']);
    Route::get('admin/rak/edit/{id}',[App\Http\Controllers\RakController::class,'edit']);
    Route::post('admin/rak/update/{id}',[App\Http\Controllers\RakController::class,'update']);
    Route::get('admin/rak/destroy/{id}',[App\Http\Controllers\RakController::class,'destroy']);

    Route::get('admin/category',[App\Http\Controllers\CategoryController::class,'index']);
    Route::post('admin/category/create',[App\Http\Controllers\CategoryController::class,'store']);
    Route::get('admin/category/edit/{id}',[App\Http\Controllers\CategoryController::class,'edit']);
    Route::post('admin/category/update/{id}',[App\Http\Controllers\CategoryController::class,'update']);
    Route::get('admin/category/destroy/{id}',[App\Http\Controllers\CategoryController::class,'destroy']);

    Route::get('admin/buku',[App\Http\Controllers\BukuController::class,'index']);
    Route::post('admin/buku/create',[App\Http\Controllers\BukuController::class,'store']);
    Route::get('admin/buku/detail/{id}',[App\Http\Controllers\BukuController::class,'show']);
    Route::get('admin/buku/edit/{id}',[App\Http\Controllers\BukuController::class,'edit']);
    Route::post('admin/buku/update/{id}',[App\Http\Controllers\BukuController::class,'update']);
    Route::get('admin/buku/destroy/{id}',[App\Http\Controllers\BukuController::class,'destroy']);



});