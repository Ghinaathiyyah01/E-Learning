<?php

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
    return view('home');
})->name('home');

Route::get('/tentang', function () {
    return view('tentang');
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
