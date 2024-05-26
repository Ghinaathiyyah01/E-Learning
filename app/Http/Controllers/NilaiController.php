<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index()
{
    // Mengambil ID pengguna yang sedang login
    $userId = Auth::id();

    // Mengambil data nilai untuk pengguna yang sedang login
    $nilai = Nilai::where('user_id', $userId)->get();

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
