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
        return view('user.nilai', compact('nilai'));
    }
    public function indexGuru()
    {
        // Memuat relasi user dan ujian saat mengambil data nilai
        $nilai = Nilai::with(['user', 'ujian'])->get();
        return view('guru.nilai.index', compact('nilai'));
    }
    public function delete($id){
        $nilai = Nilai::find($id);
        $nilai->delete();
        return redirect()->route('guru.nilai.index')->with('success', 'Informasi berhasil dihapus.');
    }
}
