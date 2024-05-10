<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        // Mengambil semua data nilai
        $nilai = Nilai::all();

        // Mengirimkan data nilai ke tampilan
        return view('nilai', compact('nilai'));
    }
}
