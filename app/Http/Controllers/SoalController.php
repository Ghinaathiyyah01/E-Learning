<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Ujian;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    public function indexGuru($ujian_id)
    {
        session(['ujian_id' => $ujian_id]);
        $soal = Soal::where('ujian_id', $ujian_id)->simplepaginate(5);
        return view('guru.soal.index', compact('soal', 'ujian_id'));
    }

    public function show($ujian_id)
    {
        $soal = Soal::where('ujian_id', $ujian_id)->get();
        $ujian = Ujian::findOrFail($ujian_id);
        return view('guru.soal.preview', compact('soal', 'ujian'));
    }

    public function create()
    {
        return view('guru.soal.create');
    }
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'pertanyaan' => 'required|string',
            'pilihan1' => 'required|string',
            'pilihan2' => 'required|string',
            'pilihan3' => 'required|string',
            'pilihan4' => 'required|string',
            'jawaban' => 'required|string', // Mengubah validasi untuk file menjadi string
        ]);

        // Ambil mapel ID dari sesi
        $ujianId = session('ujian_id');

        // Simpan data baru ke dalam database
        $soal = new Soal();
        $soal->pertanyaan = $validatedData['pertanyaan'];
        $soal->pilihan1 = $validatedData['pilihan1'];
        $soal->pilihan2 = $validatedData['pilihan2'];
        $soal->pilihan3 = $validatedData['pilihan3'];
        $soal->pilihan4 = $validatedData['pilihan4'];
        $soal->jawaban = $validatedData['jawaban']; // Simpan string file
        $soal->ujian_id = $ujianId; // Gunakan mapel ID yang didapatkan dari sesi

        $soal->save();

        // Redirect ke halaman yang sesuai atau berikan respon JSON sesuai kebutuhan
        return redirect()->route('soal.index',  ['ujian_id' => $ujianId])->with('success', 'Modul berhasil disimpan.');
    }
    public function edit($id)
    {
        $sol = Soal::find($id);
        return view('guru.soal.update', compact(['sol']));
    }
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'pertanyaan' => 'required|string',
            'pilihan1' => 'required|string',
            'pilihan2' => 'required|string',
            'pilihan3' => 'required|string',
            'pilihan4' => 'required|string',
            'jawaban' => 'required|string', // Mengubah validasi untuk file menjadi string
        ]);

        // Ambil modul yang akan diperbarui
        $soal = Soal::find($id);
        if (!$soal) {
            return redirect()->back()->with('error', 'Soal tidak ditemukan.');
        }

        // Perbarui data modul
        $soal->pertanyaan = $validatedData['pertanyaan'];
        $soal->pilihan1 = $validatedData['pilihan1'];
        $soal->pilihan2 = $validatedData['pilihan2'];
        $soal->pilihan3 = $validatedData['pilihan3'];
        $soal->pilihan4 = $validatedData['pilihan4'];
        $soal->jawaban = $validatedData['jawaban']; // Simpan string file
        $soal->save();

        // Ambil mapel ID dari sesi untuk redirect ke halaman yang benar
        $ujianId = session('ujian_id');

        // Redirect ke halaman yang sesuai atau berikan respon JSON sesuai kebutuhan
        return redirect()->route('soal.index', ['ujian_id' => $ujianId])->with('success', 'Soal berhasil diperbarui.');
    }
    public function delete($id)
    {
        $soal = Soal::find($id);
        $soal->delete();
        $ujianId = session('ujian_id');
        return redirect()->route('soal.index', ['ujian_id' => $ujianId])->with('success', 'Informasi berhasil dihapus.');
    }
}
