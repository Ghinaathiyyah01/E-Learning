<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Ujian;
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
    public function indexGuru(Request $request)
    {
        // Mengambil semua jenis ujian untuk ditampilkan di dropdown
        $semuaUjian = Ujian::all();

        // Mengambil data nilai
        $nilai = Nilai::query();

        // Jika terdapat parameter ujian_id di URL, filter berdasarkan jenis ujian
        if ($request->has('ujian_id')) {
            $nilai->where('ujian_id', $request->ujian_id);
        }

        // Mengambil data nilai setelah dilakukan filter (jika ada)
        $nilai = $nilai->get();
        return view('guru.nilai.index', compact('nilai', 'semuaUjian'));
    }    
    public function delete($id){
        $nilai = Nilai::find($id);
        $nilai->delete();
        return redirect()->route('guru.nilai.index')->with('success', 'Informasi berhasil dihapus.');
    }
}
