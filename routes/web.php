<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login_post', [App\Http\Controllers\LoginController::class, 'authenticate']);
Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout']);

// Route::get('/register', [App\Http\Controllers\registerController::class, 'index'])->middleware('guest');
// Route::post('/register', [App\Http\Controllers\registerController::class, 'store']);


Route::get('/', [App\Http\Controllers\DashboardController::class, 'landing_page']);
Route::get('/daftar_buku', [App\Http\Controllers\DashboardController::class, 'daftar_buku']);
Route::get('/daftar_buku/show/{id}', [App\Http\Controllers\DashboardController::class, 'daftar_buku_show']);
Route::get('/daftar_buku/search', [App\Http\Controllers\DashboardController::class, 'daftar_buku_search']);






// Route siswa
Route::group(['middleware' => ['auth']], function () {
    Route::get('siswa/dashboard', [App\Http\Controllers\SiswaController::class, 'detail_siswa']);
    Route::get('detail/siswa', [App\Http\Controllers\SiswaController::class, 'detail_siswa_js']);



    Route::get('siswa/daftar_pinjam_buku', [App\Http\Controllers\SiswaController::class, 'daftar_pinjam_buku']);
    Route::get('daftar_pinjam_buku_js', [App\Http\Controllers\SiswaController::class, 'daftar_pinjam_buku_js']);

    Route::get('siswa/daftar_pengembalian_buku', [App\Http\Controllers\SiswaController::class, 'daftar_pengembalian_buku']);
    Route::get('daftar_pengembalian_buku_js', [App\Http\Controllers\SiswaController::class, 'daftar_pengembalian_buku_js']);
});


// Route admin
Route::group(['middleware' => ['is_admin']], function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

    Route::get('admin/rak', [App\Http\Controllers\RakController::class, 'index']);
    Route::post('admin/rak/create', [App\Http\Controllers\RakController::class, 'store']);
    Route::get('admin/rak/edit/{id}', [App\Http\Controllers\RakController::class, 'edit']);
    Route::post('admin/rak/update/{id}', [App\Http\Controllers\RakController::class, 'update']);
    Route::get('admin/rak/destroy/{id}', [App\Http\Controllers\RakController::class, 'destroy']);

    Route::get('admin/category', [App\Http\Controllers\CategoryController::class, 'index']);
    Route::post('admin/category/create', [App\Http\Controllers\CategoryController::class, 'store']);
    Route::get('admin/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit']);
    Route::post('admin/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update']);
    Route::get('admin/category/destroy/{id}', [App\Http\Controllers\CategoryController::class, 'destroy']);

    Route::get('admin/buku', [App\Http\Controllers\BukuController::class, 'index']);
    Route::post('admin/buku/create', [App\Http\Controllers\BukuController::class, 'store']);
    Route::get('admin/buku/detail/{id}', [App\Http\Controllers\BukuController::class, 'show']);
    Route::get('admin/buku/edit/{id}', [App\Http\Controllers\BukuController::class, 'edit']);
    Route::post('admin/buku/update/{id}', [App\Http\Controllers\BukuController::class, 'update']);
    Route::get('admin/buku/destroy/{id}', [App\Http\Controllers\BukuController::class, 'destroy']);

    Route::get('admin/user', [App\Http\Controllers\UserController::class, 'index']);
    Route::post('admin/user/create', [App\Http\Controllers\UserController::class, 'store']);
    Route::get('admin/user/detail/{id}', [App\Http\Controllers\UserController::class, 'show']);
    Route::get('admin/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::post('admin/user/update/{id}', [App\Http\Controllers\UserController::class, 'update']);
    Route::get('admin/user/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy']);


    Route::get('admin/murid', [App\Http\Controllers\MuridController::class, 'index']);
    Route::post('admin/murid/create', [App\Http\Controllers\MuridController::class, 'store']);
    Route::get('admin/murid/detail/{id}', [App\Http\Controllers\MuridController::class, 'show']);
    Route::get('admin/murid/edit/{id}', [App\Http\Controllers\MuridController::class, 'edit']);
    Route::post('admin/murid/update/{id}', [App\Http\Controllers\MuridController::class, 'update']);
    Route::get('admin/murid/destroy/{id}', [App\Http\Controllers\MuridController::class, 'destroy']);

    Route::get('admin/guru', [App\Http\Controllers\GuruController::class, 'index']);
    Route::post('admin/guru/create', [App\Http\Controllers\GuruController::class, 'store']);
    Route::get('admin/guru/detail/{id}', [App\Http\Controllers\GuruController::class, 'show']);
    Route::get('admin/guru/edit/{id}', [App\Http\Controllers\GuruController::class, 'edit']);
    Route::post('admin/guru/update/{id}', [App\Http\Controllers\GuruController::class, 'update']);
    Route::get('admin/guru/destroy/{id}', [App\Http\Controllers\GuruController::class, 'destroy']);
    
    Route::get('admin/denda', [App\Http\Controllers\DendaController::class, 'index']);
    Route::get('admin/denda/show/{id}', [App\Http\Controllers\DendaController::class, 'show']);
    Route::post('admin/denda/update_jumlah_denda/{id}', [App\Http\Controllers\DendaController::class, 'update_jumlah_denda']);


    Route::get('admin/laporan', [App\Http\Controllers\LaporanController::class, 'index']);
    Route::post('admin/laporan/pinjam_buku', [App\Http\Controllers\LaporanController::class, 'pinjam_buku']);
    Route::post('admin/laporan/pengembalian_buku', [App\Http\Controllers\LaporanController::class, 'pengembalian_buku']);
    Route::post('admin/laporan/denda', [App\Http\Controllers\LaporanController::class, 'denda']);

  
});

Route::get('admin/pinjam_buku', [App\Http\Controllers\PinjamBukuController::class, 'index']);
Route::get('admin/pinjam_buku/show/{id}', [App\Http\Controllers\PinjamBukuController::class, 'show']);
Route::post('admin/pinjam_buku/create', [App\Http\Controllers\PinjamBukuController::class, 'store']);
Route::put('admin/pinjam_buku/update/{id}', [App\Http\Controllers\PinjamBukuController::class, 'update']);
Route::delete('admin/pinjam_buku/delete/{id}', [App\Http\Controllers\PinjamBukuController::class, 'destroy']);


Route::get('admin/pengembalian_buku', [App\Http\Controllers\PengembalianBukuController::class, 'index']);
Route::get('admin/pengembalian_buku/show/{id}', [App\Http\Controllers\PengembalianBukuController::class, 'show']);
Route::post('admin/pengembalian_buku/create', [App\Http\Controllers\PengembalianBukuController::class, 'store']);
Route::put('admin/pengembalian_buku/update/{id}', [App\Http\Controllers\PengembalianBukuController::class, 'update']);
Route::delete('admin/pengembalian_buku/delete/{id}', [App\Http\Controllers\PengembalianBukuController::class, 'destroy']);


// bayar denda
Route::get('admin/pengembalian_buku/bayar_denda/{id}', [App\Http\Controllers\PengembalianBukuController::class, 'bayar_denda']);
Route::put('admin/pengembalian_buku/bayar_denda/{id}', [App\Http\Controllers\PengembalianBukuController::class, 'bayar_denda_proses']);

