<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DataAdminController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\TandaTanganController;
use App\Http\Controllers\HasilPengaduanController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login/user', [LoginController::class, 'index']);
Route::post('/login/user', [LoginController::class, 'authenticate']);
Route::post('/logout/user', [LoginController::class, 'logout']);

Route::get('/register/user', [RegisterController::class, 'index']);
Route::post('/register/user', [RegisterController::class, 'store']);

Route::get('/hasil-pengaduan', [HasilPengaduanController::class, 'datauser'])->middleware('auth:pengguna');

Route::get('/permohonan', [PermohonanController::class, 'index'])->middleware('auth:pengguna');
Route::post('/permohonan/buat', [PermohonanController::class, 'ajukan'])->middleware('auth:pengguna');
Route::get('/cetakpdf/{id}', [PermohonanController::class, 'eksporpdf'])->middleware('auth:pengguna');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::group(['middleware' => ['auth:web', 'role:superadmin|admin']], function () {

    Route::get('/dashboard-admin', [BerandaController::class, 'indexadmin'])->name('dashboard-admin');

    Route::resource('/data-formulir', DataController::class);
    Route::get('/data-formulir/{id}/status', [DataController::class, 'status']);
    // Route::post('/data-formulir/{id}/update', [DataController::class, 'update']);
    Route::get('/data-formulir-get', [DataController::class, 'getDataForm'])->name('data-formulir-get')->middleware('auth', 'verified');
    Route::get('/export-excel', [DataController::class, 'exportExcel'])->name('export-excel')->middleware('auth', 'verified');
    // Route::POST('/formulir-pdf', [DataController::class, 'unduhpdf'])->name('formulir-permohonan-informasi=post')->middleware('auth', 'verified');
    Route::get('/formulir-pdf/{id}', [DataController::class, 'unduhpdf'])->name('formulir-permohonan-informasi')->middleware('auth', 'verified');


    Route::resource('/data-admin', DataAdminController::class);
    Route::get('/data-admin-get', [DataAdminController::class, 'getDataAdmin'])->name('data-admin-get')->middleware('auth', 'verified');
    Route::get('/data-admin/sampah', [DataAdminController::class, 'sampah'])->name('data-admin.sampah')->middleware('auth', 'verified');
    
    // Route::get('/data-admin-destroy/{id}', DataAdminController::class, 'destroy')->name('data-admin.destroy')->middleware('auth', 'verfied');

    Route::get('/tanda-tangan',[TandaTanganController::class, 'index']);
    Route::post('/create-tanda-tangan', [TandaTanganController::class, 'simpanTtd']);
    // Route::get('/dashboard/admin', [BerandaController::class, 'indexadmin']);
    // Route::get('/admin/tambah-admin', [BerandaController::class, 'tambahAdmin']);
    // Route::post('/admin/tambah-admin', [BerandaController::class, 'store']);
    // Route::get('/admin/data-admin', [BerandaController::class, 'dataAdmin']);
    // Route::get('/dashboard/admin/cari', [BerandaController::class, 'cari']);
    // Route::get('/export-excel', [BerandaController::class, 'exportExcel']);
});

// Route::group(['middleware' => ['role:admin']], function () {
//     Route::get('/dashboard/admin', [BerandaController::class, 'indexadmin']);
// });

// Route::group(['middleware' => ['role:user']], function () {

// });
require __DIR__ . '/auth.php';
