<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('admin/pinjam_buku', [App\Http\Controllers\Api\PinjamBukuController::class, 'index']);
Route::post('admin/pinjam_buku/create', [App\Http\Controllers\Api\PinjamBukuController::class, 'store']);
Route::get('admin/pinjam_buku/show/{id}', [App\Http\Controllers\Api\PinjamBukuController::class, 'show']);
Route::put('admin/pinjam_buku/update/{id}', [App\Http\Controllers\Api\PinjamBukuController::class, 'update']);
Route::delete('admin/pinjam_buku/delete/{id}', [App\Http\Controllers\Api\PinjamBukuController::class, 'destroy']);






Route::get('admin/pengembalian_buku', [App\Http\Controllers\Api\PengembalianBukuController::class, 'index']);
Route::post('admin/pengembalian_buku/create', [App\Http\Controllers\Api\PengembalianBukuController::class, 'store']);
Route::get('admin/pengembalian_buku/show/{id}', [App\Http\Controllers\Api\PengembalianBukuController::class, 'show']);
Route::put('admin/pengembalian_buku/update/{id}', [App\Http\Controllers\Api\PengembalianBukuController::class, 'update']);
Route::delete('admin/pengembalian_buku/delete/{id}', [App\Http\Controllers\Api\PengembalianBukuController::class, 'destroy']);