<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\Master\GuruController;
use App\Http\Controllers\Master\SantriController;
use App\Http\Controllers\Master\KelasController;
use App\Http\Controllers\Master\MapelController;
use App\Http\Controllers\Master\SemesterController;
use App\Http\Controllers\Master\TahunAjaranController;
use App\Http\Controllers\Master\PredikatController;
use App\Http\Controllers\Master\DoaHarianController;
use App\Http\Controllers\Master\KepribadianController;
use App\Http\Controllers\Master\TahfidzController;
use App\Http\Controllers\Master\GuruMengajarController;
use App\Http\Controllers\Master\NilaiController;
use App\Http\Controllers\Master\NilaiDoaController;
use App\Http\Controllers\Master\NilaiKepribadianController;
use App\Http\Controllers\Master\NilaiTahfidzController;
use App\Http\Controllers\Penilaian\NilaiTilawatiController;
use App\Http\Controllers\Master\TilawatiController;
use App\Http\Controllers\Master\AbsensiController;
use App\Http\Controllers\Master\PengaturanController;

/*
|--------------------------------------------------------------------------
| Redirect root to login
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // =========================
    // IMPORT SANTRI
    // =========================

    Route::get(
        'santri/template',
        [SantriController::class, 'downloadTemplate']
    )->name('santri.template');

    Route::post(
        'santri/import',
        [SantriController::class, 'import']
    )->name('santri.import');
    /*
    |--------------------------------------------------------------------------
    | Master Data
    |--------------------------------------------------------------------------
    */

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::resource('user', UserController::class);
    });
    Route::resource('guru', GuruController::class)->middleware('role:admin,kepala');
    Route::resource('santri', SantriController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('mapel', MapelController::class);
    Route::resource('semester', SemesterController::class);
    Route::resource('tahun-ajaran', TahunAjaranController::class);
    Route::resource('predikat', PredikatController::class);
    Route::resource('doa-harian', DoaHarianController::class);
    Route::resource('kepribadian', KepribadianController::class);
    Route::resource('absensi', AbsensiController::class);
    Route::resource('tilawati', TilawatiController::class);

    Route::get(
        'nilai/santri/{santri}',
        [NilaiController::class, 'editBySantri']
    )->name('nilai.edit-santri');

    Route::post(
        'nilai/generate',
        [NilaiController::class, 'generate']
    )->name('nilai.generate');

    Route::post(
        '/nilai/{id}/tilawati',
        [NilaiController::class, 'simpanNilaiTilawati']
    )->name('nilai.tilawati');

    Route::resource('tahfidz', TahfidzController::class);
    Route::resource('nilai', NilaiController::class);
    Route::post(
        'nilai/{nilai}/akademik',
        [NilaiController::class, 'storeAkademik']
    )->name('nilai-akademik.store');
    Route::post(
        '/nilai/{nilai}/doa',
        [NilaiController::class, 'simpanNilaiDoa']
    )->name('nilai.doa.store');
    Route::post(
        '/nilai/{nilai}/kepribadian',
        [NilaiController::class, 'simpanNilaiKepribadian']
    )->name('nilai.kepribadian.store');
    Route::post(
        '/nilai/{id}/kepribadian',
        [\App\Http\Controllers\Master\NilaiController::class, 'simpanNilaiKepribadian']
    )->name('nilai.kepribadian');

    Route::post(
        '/nilai/{id}/tahfidz',
        [NilaiController::class, 'simpanNilaiTahfidz']
    )->name('nilai.tahfidz');

    Route::post(
        '/nilai/{id}/catatan',
        [NilaiController::class, 'simpanCatatan']
    )->name('nilai.catatan');

    Route::get(
        '/nilai/{id}/print',
        [NilaiController::class, 'cetak']
    )->name('nilai.print');



    /*
    |--------------------------------------------------------------------------
    | Akademik
    |--------------------------------------------------------------------------
    */

    Route::resource('guru-mengajar', GuruMengajarController::class)->middleware('role:admin,kepala');

    /*
    |--------------------------------------------------------------------------
    | Penilaian
    |--------------------------------------------------------------------------
    */

    Route::resource('nilai-doa', NilaiDoaController::class);
    Route::resource('nilai-kepribadian', NilaiKepribadianController::class);
    Route::resource('nilai-tahfidz', NilaiTahfidzController::class);

    /*
    |--------------------------------------------------------------------------
    | Absensi
    |--------------------------------------------------------------------------
    */
    Route::post(
        '/nilai/{id}/absensi',
        [NilaiController::class, 'simpanAbsensi']
    )->name('nilai.absensi');

    /*
    |--------------------------------------------------------------------------
    | Pengaturan
    |--------------------------------------------------------------------------
    */

    Route::resource('pengaturan', PengaturanController::class);

    /*
    |--------------------------------------------------------------------------
    | Rapor
    |--------------------------------------------------------------------------
    */

    Route::get('/rapor', function () {
        return 'Modul Rapor';
    })->name('rapor.index');

    Route::get(
        '/nilai/{id}/cetak',
        [NilaiController::class, 'cetak']
    )->name('nilai.cetak');
});

require __DIR__ . '/auth.php';

//import Guru
Route::get(
    'guru-template',
    [GuruController::class, 'downloadTemplate']
)->name('guru.template');

Route::post(
    'guru-import',
    [GuruController::class, 'import']
)->name('guru.import');
