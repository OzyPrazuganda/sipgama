<?php

use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardWargaController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\IuranController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TipeRumahController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\SuratController;

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

#Section Login/Logout
Route::get('', [LandingController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate']);
Route::get('logout', [LoginController::class, 'logout']);

Route::middleware(['AuthCheck'])->group(function () {
    #Profile Section
    Route::get('profile', [LoginController::class, 'profile']);

    #Section Dashboard
    Route::get('/dashboard_admin', [DashboardAdminController::class, 'index']);
    Route::get('/dashboard_warga', [DashboardWargaController::class, 'index']);

    #Section Users
    Route::get('register', [RegisterController::class, 'index']);
    Route::post('register', [RegisterController::class, 'store']);
    Route::post('register/update/{id}', [RegisterController::class, 'update']);
    Route::get('delete/{id}', [RegisterController::class, 'drop']);
    Route::post('register/import', [RegisterController::class, 'import']);

    # Section Tipe Rumah
    Route::get('tipe_rumah', [TipeRumahController::class, 'index']);
    Route::post('register_tipe_rumah', [TipeRumahController::class, 'store']);
    Route::post('edit_tipe_rumah/update/{id}', [TipeRumahController::class, 'update']);
    Route::get('tipe_rumah/delete/{id}', [TipeRumahController::class, 'drop']);

    # Section Rumah
    route::get('rumah', [RumahController::class, 'index']);
    route::post('tambah_rumah', [RumahController::class, 'store']);
    route::get('rumah/delete/{id}', [RumahController::class, 'drop']);
    route::post('rumah/update/{id}', [RumahController::class, 'update']);

    # Section Metode Pembayaran
    route::get('metode_pembayaran', [MetodePembayaranController::class, 'index']);
    route::post('register_metode_pembayaran', [MetodePembayaranController::class, 'store']);
    route::post('metode_pembayaran/update/{id}', [MetodePembayaranController::class, 'update']);
    route::get('metode_pembayaran/delete/{id}', [MetodePembayaranController::class, 'drop']);

    # Inventaris Section
    route::get('inventaris', [InventarisController::class, 'index']);
    route::post('inventaris/register', [InventarisController::class, 'store']);
    route::post('inventaris/update/{id}', [InventarisController::class, 'update']);
    route::get('inventaris/delete/{id}', [InventarisController::class, 'drop']);

    # pengeluaran
    route::get('pengeluaran', [PengeluaranController::class, 'index']);
    route::post('pengeluaran/register', [PengeluaranController::class, 'store']);
    route::post('pengeluaran/update/{id}', [PengeluaranController::class, 'update']);
    route::get('pengeluaran/delete/{id}', [PengeluaranController::class, 'drop']);

    # Permohonan Surat
    route::get('permohonan', [PermohonanController::class, 'index']);
    route::post('tambah_permohonan', [PermohonanController::class, 'store']);
    route::get('permohonan/delete/{id}', [PermohonanController::class, 'drop']);
    route::post('permohonan/update/{id}', [PermohonanController::class, 'update']);

    # Daftar Surat
    route::get('surat', [SuratController::class, 'index']);
    route::post('surat/register', [SuratController::class, 'store']);
    route::post('surat/update/{id}', [SuratController::class, 'update']);
    // route::get('surat/delete/{id}', [SuratController::class, 'drop']);

    # Pembayaran Iuran
    route::get('pembayaran', [PembayaranController::class, 'index']);
    route::post('pembayaran/iuran', [PembayaranController::class, 'store']);
    route::post('pembayaran/update/{id}', [PembayaranController::class, 'update']);
    // route::get('pembayaran/delete/{id}', [PembayaranController::class, 'drop']);

    # Daftar Iuran
    route::get('daftar_iuran', [IuranController::class, 'index']);
    route::post('iuran/register', [IuranController::class, 'store']);
    route::post('iuran/update/{id}', [IuranController::class, 'update']);
    // route::get('iuran/delete/{id}', [IuranController::class, 'drop']);

    # Rekapitulasi
    route::get('rekapitulasi', [PemasukanController::class, 'index']);
    route::post('rekapitulasi/register', [PemasukanController::class, 'store']);
    route::post('rekapitulasi/update/{id}', [PemasukanController::class, 'update']);
    route::get('rekapitulasi/delete/{id}', [PemasukanController::class, 'drop']);
});
