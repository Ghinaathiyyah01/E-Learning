<?php

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
});

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
