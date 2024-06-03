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
    $cari = $request->query('cari');
    $ujian_id = $request->query('ujian_id');

    // Mengambil data nilai
    $nilai = Nilai::join('users', 'nilais.user_id', '=', 'users.id')
        ->select('nilais.*', 'users.name');

    // Lakukan pencarian jika ada kata kunci pencarian
    if (!empty($cari)) {
        $nilai->where(function($query) use ($cari) {
            $query->where('nilai', 'like', '%' . $cari . '%')
                  ->orWhere('users.name', 'like', '%' . $cari . '%');
        });
    }

    // Lakukan filtering jika ada parameter ujian_id
    if (!empty($ujian_id)) {
        $nilai->where('ujian_id', $ujian_id);
    }

    // Mengambil data nilai setelah dilakukan filter dan pencarian (jika ada)
    $nilai = $nilai->simplepaginate(10);

    $semuaUjian = Ujian::all();

    return view('guru.nilai.index', compact('nilai', 'cari', 'semuaUjian', 'ujian_id'));
}

    public function delete($id){
        $nilai = Nilai::find($id);
        $nilai->delete();
        return redirect()->route('guru.nilai.index')->with('success', 'Informasi berhasil dihapus.');
    }
}
