<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    public function index()
    {
        $modul = Modul::all();
        return view('modul', compact('modul'));
    }
    public function indexGuru($mapel_id)
    {
        session(['mapel_id' => $mapel_id]);
        $modul = Modul::where('mapel_id', $mapel_id)->get();
        return view('guru.submodul.index', compact('modul'));
    }
    public function create()
    {
        return view('guru.submodul.create');
    }
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file' => 'required|string', // Mengubah validasi untuk file menjadi string
        ]);

        // Ambil mapel ID dari sesi
        $mapelId = session('mapel_id');

        // Simpan data baru ke dalam database
        $modul = new Modul();
        $modul->judul = $validatedData['judul'];
        $modul->deskripsi = $validatedData['deskripsi'];
        $modul->file = $validatedData['file']; // Simpan string file
        $modul->mapel_id = $mapelId; // Gunakan mapel ID yang didapatkan dari sesi

        $modul->save();

        // Redirect ke halaman yang sesuai atau berikan respon JSON sesuai kebutuhan
        return redirect()->route('submodul.index',  ['mapel_id' => $mapelId])->with('success', 'Modul berhasil disimpan.');
    }
    public function edit($id)
    {
        $mod = Modul::find($id);
        return view('guru.submodul.update', compact(['mod']));
    }
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file' => 'required|string', // Mengubah validasi untuk file menjadi string
        ]);

        // Ambil modul yang akan diperbarui
        $modul = Modul::find($id);
        if (!$modul) {
            return redirect()->back()->with('error', 'Modul tidak ditemukan.');
        }

        // Perbarui data modul
        $modul->judul = $validatedData['judul'];
        $modul->deskripsi = $validatedData['deskripsi'];
        $modul->file = $validatedData['file']; // Simpan string file
        $modul->save();

        // Ambil mapel ID dari sesi untuk redirect ke halaman yang benar
        $mapelId = session('mapel_id');

        // Redirect ke halaman yang sesuai atau berikan respon JSON sesuai kebutuhan
        return redirect()->route('submodul.index', ['mapel_id' => $mapelId])->with('success', 'Modul berhasil diperbarui.');
    }
    public function delete($id){
        $modul = Modul::find($id);
        $modul->delete();
        $mapelId = session('mapel_id');
        return redirect()->route('submodul.index', ['mapel_id' => $mapelId])->with('success', 'Informasi berhasil dihapus.');
    }
}
