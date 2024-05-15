<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Soal;
use App\Models\Ujian;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function index(){
        $ujian = Ujian::all();
        return view('user.ujian.index', compact('ujian'));
    }
    public function ujian($id)
    {
        // Mengambil informasi ujian
        $ujian = Ujian::findOrFail($id);

        // Mengambil pertanyaan-pertanyaan ujian
        $soal = Soal::where('ujian_id', $id)->get();

        return view('user.ujian.ujian', compact('ujian', 'soal'));
    }
    public function submit(Request $request)
    {
        // Validasi request
        $request->validate([
            'jawaban.*' => 'required', // Menyatakan setiap jawaban wajib diisi
        ]);

        // Menghitung jumlah soal
        $totalSoal = count($request->jawaban);

        // Menghitung total jawaban benar
        $jawabanBenar = 0;

        foreach ($request->jawaban as $soal_id => $jawaban) {
            $soal = Soal::findOrFail($soal_id);
        
            // Cek jawaban benar
            if ($jawaban === $soal->jawaban) {
                $jawabanBenar++;
            }
        }

        // Menghitung nilai berdasarkan persentase jawaban benar
        $nilaiPersentase = ($jawabanBenar / $totalSoal) * 100;    

        // Simpan nilai ke dalam database
        $nilai = new Nilai();
        $nilai->ujian_id = $request->ujian_id;
        $nilai->user_id = 1;
        $nilai->tanggal = now();
        $nilai->nilai = $nilaiPersentase;
        $nilai->save();

        // Redirect atau tampilkan pesan berhasil
        return redirect()->route('hasil.ujian', ['id' => $nilai->id])->with('success', 'Jawaban berhasil disimpan. Nilai Anda: ' . $nilaiPersentase);
    }
    public function show($id)
    {
        // Cari nilai berdasarkan ID
        $nilai = Nilai::findOrFail($id);

        // Tampilkan halaman dengan data nilai
        return view('user.ujian.hasil', compact('nilai'));
    }
}
