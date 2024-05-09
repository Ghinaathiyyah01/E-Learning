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
        return view('ujian.index', compact('ujian'));
    }
    public function ujian($id)
    {
        // Mengambil informasi ujian
        $ujian = Ujian::findOrFail($id);

        // Mengambil pertanyaan-pertanyaan ujian
        $soal = Soal::where('ujian_id', $id)->get();

        return view('ujian.ujian', compact('ujian', 'soal'));
    }
    public function submit(Request $request)
    {
        // Validasi request
        $request->validate([
            'jawaban.*' => 'required', // Menyatakan setiap jawaban wajib diisi
        ]);

        // Hitung total nilai
        $totalNilai = 0;

        foreach ($request->jawaban as $soal_id => $jawaban) {
            $soal = Soal::findOrFail($soal_id);

            // Cek jawaban benar
            if ($jawaban === $soal->jawaban) {
                // Jika jawaban benar, tambahkan 10 ke total nilai
                $totalNilai += 10;
            }
        }

        // Simpan nilai ke dalam database
        $nilai = new Nilai();
        $nilai->ujian_id = $request->ujian_id;
        $nilai->user_id = 1;
        $nilai->nilai = $totalNilai;
        $nilai->save();

        // Redirect atau tampilkan pesan berhasil
        return redirect()->route('home')->with('success', 'Jawaban berhasil disimpan. Nilai Anda: ' . $totalNilai);
    }
}
