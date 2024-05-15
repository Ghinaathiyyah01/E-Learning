<?php

use App\Http\Controllers\InformasiController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\UjianController;
use Illuminate\Support\Facades\Route;

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
    return view('user.home');
})->name('home');

Route::get('/tentang', function () {
    return view('user.tentang');
});

Route::get('/tugas', function () {
    return view('tugas');
});

// Route::get('/modul', function () {
//     return view('modul');
// });

Route::get('/modul', [\App\Http\Controllers\MapelController::class, 'index']);
Route::get('/materi/{mapel_id}', [\App\Http\Controllers\MapelController::class, 'materi']);
Route::get('/ujian', [\App\Http\Controllers\UjianController::class, 'index']);
Route::get('/ujian/{ujian_id}', [UjianController::class, 'ujian'])->name('ujian.index');
Route::post('/ujian/submit', [UjianController::class, 'submit'])->name('ujian.submit');
Route::get('/hasil_ujian/{id}', [UjianController::class, 'show'])->name('hasil.ujian');
Route::get('/informasi', [\App\Http\Controllers\InformasiController::class, 'index']);
Route::get('/nilai', [\App\Http\Controllers\NilaiController::class, 'index']);


Route::get('/guru', function () {
    return view('guru.home');
});
Route::get('/guru/informasi', [\App\Http\Controllers\InformasiController::class, 'indexGuru'])->name('guru.informasi.index');
Route::get('/guru/informasi/create', [\App\Http\Controllers\InformasiController::class, 'create']);
Route::post('/guru/informasi/store', [\App\Http\Controllers\InformasiController::class, 'store'])->name('guru.informasi.store');
Route::delete('/guru/informasi/{id}', [InformasiController::class, 'delete'])->name('informasi.delete');
Route::get('/informasi/update/{id}', [\App\Http\Controllers\InformasiController::class, 'edit']);
Route::put('/informasi/{id}', [\App\Http\Controllers\InformasiController::class, 'update']);

Route::get('/guru/modul', [\App\Http\Controllers\MapelController::class, 'indexGuru'])->name('guru.modul.index');
Route::get('/guru/modul/create', [\App\Http\Controllers\MapelController::class, 'create']);
Route::post('/guru/modul/store', [\App\Http\Controllers\MapelController::class, 'store'])->name('guru.modul.store');
Route::get('/modul/update/{id}', [\App\Http\Controllers\MapelController::class, 'edit']);
Route::put('/modul/{id}', [\App\Http\Controllers\MapelController::class, 'update']);
Route::delete('/guru/modul/{id}', [MapelController::class, 'delete'])->name('modul.delete');

Route::get('/submodul/{mapel_id}', [ModulController::class, 'indexGuru'])->name('submodul.index');
Route::get('/guru/submodul/create', [\App\Http\Controllers\ModulController::class, 'create']);
Route::post('/submodul/store', [ModulController::class, 'store'])->name('modul.store');
Route::get('/submodul/update/{id}', [\App\Http\Controllers\ModulController::class, 'edit']);
Route::put('/submodul/{id}', [\App\Http\Controllers\ModulController::class, 'update']);
Route::delete('/guru/submodul/{id}', [ModulController::class, 'delete'])->name('submodul.delete');

Route::get('/guru/ujian', [\App\Http\Controllers\UjianController::class, 'indexGuru'])->name('guru.ujian.index');
Route::get('/guru/ujian/create', [\App\Http\Controllers\UjianController::class, 'create']);
Route::post('/guru/ujian/store', [\App\Http\Controllers\UjianController::class, 'store'])->name('guru.ujian.store');
Route::get('/ujian/update/{id}', [\App\Http\Controllers\UjianController::class, 'edit']);
Route::put('/ujian/{id}', [\App\Http\Controllers\UjianController::class, 'update']);
Route::delete('/guru/ujian/{id}', [UjianController::class, 'delete'])->name('ujian.delete');

Route::get('/soal/{ujian_id}', [SoalController::class, 'indexGuru'])->name('soal.index');
Route::get('/guru/soal/create', [\App\Http\Controllers\SoalController::class, 'create']);
Route::post('/soal/store', [SoalController::class, 'store'])->name('soal.store');
Route::get('/soal/update/{id}', [\App\Http\Controllers\SoalController::class, 'edit']);
Route::put('/soal/{id}', [\App\Http\Controllers\SoalController::class, 'update']);
Route::delete('/guru/soal/{id}', [SoalController::class, 'delete'])->name('soal.delete');

Route::get('/guru/nilai', [\App\Http\Controllers\NilaiController::class, 'indexGuru'])->name('guru.nilai.index');
Route::delete('/guru/nilai/{id}', [NilaiController::class, 'delete'])->name('nilai.delete');