<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Soal;
use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UjianController extends Controller
{ 
    public function index(Request $request){
        $cari = $request->query('cari');
    
        if (!empty($cari)) {
            $ujian = Ujian::where('nama', 'like', '%' . $cari . '%')
                ->get();
        } else {
            $ujian = Ujian::all();
        }
        $ujian = Ujian::all();
        return view('user.ujian.index', compact('ujian','cari'));
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
        $nilai->user_id = Auth::id();
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
    public function indexGuru(Request $request){
        $cari = $request->query('cari');
    
        if (!empty($cari)) {
            $ujian = Ujian::where('nama', 'like', '%' . $cari . '%')
                ->get();
        } else {
            $ujian = Ujian::simplepaginate(5);
        }
    
        return view('guru.ujian.index', compact('ujian','cari'));
    
    }
    public function create()
    {
        return view('guru.ujian.create');
    }
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'waktu_ujian' => 'required|date',
        ]);

        // Simpan data ujian baru ke dalam database
        $ujian = new Ujian();
        $ujian->nama = $validatedData['nama'];
        $ujian->deskripsi = $validatedData['deskripsi'];
        $ujian->waktu_ujian = $validatedData['waktu_ujian'];
        $ujian->save();

        // Redirect ke halaman yang sesuai atau berikan respon JSON sesuai kebutuhan
        return redirect()->route('guru.ujian.index')->with('success', 'Ujian berhasil dibuat.');
    }
    public function edit($id)
    {
        $uji = Ujian::find($id);
        return view('guru.ujian.update', compact(['uji']));
    }
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'waktu_ujian' => 'required|date',
        ]);

        // Temukan ujian berdasarkan ID dan perbarui data
        $ujian = Ujian::findOrFail($id);
        $ujian->nama = $validatedData['nama'];
        $ujian->deskripsi = $validatedData['deskripsi'];
        $ujian->waktu_ujian = $validatedData['waktu_ujian'];
        $ujian->save();

        // Redirect ke halaman yang sesuai atau berikan respon JSON sesuai kebutuhan
        return redirect()->route('guru.ujian.index')->with('success', 'Ujian berhasil diperbarui.');
    }
    public function delete($id){
        $ujian = Ujian::find($id);
        $ujian->delete();
        return redirect()->route('guru.ujian.index')->with('success', 'Informasi berhasil dihapus.');
    }
}
