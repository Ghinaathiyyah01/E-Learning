<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/modul', [\App\Http\Controllers\MapelController::class, 'index']);
Route::get('/materi/{mapel_id}', [\App\Http\Controllers\MapelController::class, 'materi']);
Route::get('/ujian', [\App\Http\Controllers\UjianController::class, 'index']);
Route::get('/ujian/{ujian_id}', [UjianController::class, 'ujian'])->name('ujian.index');
Route::post('/ujian/submit', [UjianController::class, 'submit'])->name('ujian.submit');
Route::get('/hasil_ujian/{id}', [UjianController::class, 'show'])->name('hasil.ujian');
Route::get('/informasi', [\App\Http\Controllers\InformasiController::class, 'index']);
Route::get('/nilai', [\App\Http\Controllers\NilaiController::class, 'index']);

Route::get('/guru/informasi', [\App\Http\Controllers\InformasiController::class, 'Guru'])->name('guru.informasi.index')->middleware(['auth','admin']);
Route::get('/guru/informasi/create', [\App\Http\Controllers\InformasiController::class, 'create'])->middleware(['auth','admin']);
Route::post('/guru/informasi/store', [\App\Http\Controllers\InformasiController::class, 'store'])->name('guru.informasi.store')->middleware(['auth','admin']);
Route::delete('/guru/informasi/{id}', [InformasiController::class, 'delete'])->name('informasi.delete')->middleware(['auth','admin']);
Route::get('/informasi/update/{id}', [\App\Http\Controllers\InformasiController::class, 'edit'])->middleware(['auth','admin']);
Route::put('/informasi/{id}', [\App\Http\Controllers\InformasiController::class, 'update'])->middleware(['auth','admin']);

Route::get('/guru/modul', [\App\Http\Controllers\MapelController::class, 'indexGuru'])->name('guru.modul.index')->middleware(['auth','admin']);
Route::get('/guru/modul/create', [\App\Http\Controllers\MapelController::class, 'create'])->middleware(['auth','admin']);
Route::post('/guru/modul/store', [\App\Http\Controllers\MapelController::class, 'store'])->name('guru.modul.store')->middleware(['auth','admin']);
Route::get('/modul/update/{id}', [\App\Http\Controllers\MapelController::class, 'edit'])->middleware(['auth','admin']);
Route::put('/modul/{id}', [\App\Http\Controllers\MapelController::class, 'update'])->middleware(['auth','admin']);
Route::delete('/guru/modul/{id}', [MapelController::class, 'delete'])->name('modul.delete')->middleware(['auth','admin']);

Route::get('/submodul/{mapel_id}', [ModulController::class, 'indexGuru'])->name('submodul.index')->middleware(['auth','admin']);
Route::get('/guru/submodul/create', [\App\Http\Controllers\ModulController::class, 'create'])->middleware(['auth','admin']);
Route::post('/submodul/store', [ModulController::class, 'store'])->name('modul.store')->middleware(['auth','admin']);
Route::get('/submodul/update/{id}', [\App\Http\Controllers\ModulController::class, 'edit'])->middleware(['auth','admin']);
Route::put('/submodul/{id}', [\App\Http\Controllers\ModulController::class, 'update'])->middleware(['auth','admin']);
Route::delete('/guru/submodul/{id}', [ModulController::class, 'delete'])->name('submodul.delete')->middleware(['auth','admin']);

Route::get('/guru/ujian', [\App\Http\Controllers\UjianController::class, 'indexGuru'])->name('guru.ujian.index')->middleware(['auth','admin']);
Route::get('/guru/ujian/create', [\App\Http\Controllers\UjianController::class, 'create'])->middleware(['auth','admin']);
Route::post('/guru/ujian/store', [\App\Http\Controllers\UjianController::class, 'store'])->name('guru.ujian.store')->middleware(['auth','admin']);
Route::get('/ujian/update/{id}', [\App\Http\Controllers\UjianController::class, 'edit'])->middleware(['auth','admin']);
Route::put('/ujian/{id}', [\App\Http\Controllers\UjianController::class, 'update'])->middleware(['auth','admin']);
Route::delete('/guru/ujian/{id}', [UjianController::class, 'delete'])->name('ujian.delete')->middleware(['auth','admin']);

Route::get('/soal/{ujian_id}', [SoalController::class, 'indexGuru'])->name('soal.index')->middleware(['auth','admin']);
Route::get('/guru/soal/create', [\App\Http\Controllers\SoalController::class, 'create'])->middleware(['auth','admin']);
Route::post('/soal/store', [SoalController::class, 'store'])->name('soal.store')->middleware(['auth','admin']);
Route::get('/soal/update/{id}', [\App\Http\Controllers\SoalController::class, 'edit'])->middleware(['auth','admin']);
Route::put('/soal/{id}', [\App\Http\Controllers\SoalController::class, 'update'])->middleware(['auth','admin']);
Route::delete('/guru/soal/{id}', [SoalController::class, 'delete'])->name('soal.delete')->middleware(['auth','admin']);

Route::get('/guru/nilai', [\App\Http\Controllers\NilaiController::class, 'indexGuru'])->name('guru.nilai.index')->middleware(['auth','admin']);
Route::delete('/guru/nilai/{id}', [NilaiController::class, 'delete'])->name('nilai.delete')->middleware(['auth','admin']);

require __DIR__.'/auth.php';
