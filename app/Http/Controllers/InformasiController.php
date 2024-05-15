<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index(){
        $informasi = Informasi::orderBy('tanggal', 'desc')->get();
        return view('user.informasi', compact('informasi'));
    }
    public function indexGuru(){
        $informasi = Informasi::orderBy('tanggal', 'desc')->get();
        return view('guru.informasi.index', compact('informasi'));
    }
    public function create()
    {
        return view('guru.informasi.create');
    }
    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $informasi = new Informasi();
        $informasi->judul = $request->judul;
        $informasi->deskripsi = $request->deskripsi;
        $informasi->tanggal = now();
        $informasi->save();

        // Redirect atau tampilkan pesan berhasil
        return redirect()->route('guru.informasi.index')->with('success', 'Informasi berhasil ditambahkan');
    }
    public function edit($id)
    {
        $info = Informasi::find($id);
        return view('guru.informasi.update', compact(['info']));
    }
    public function update(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $informasi = Informasi::find($id);
        if (!$informasi) {
            return redirect()->route('guru.informasi.index')->with('error', 'Informasi tidak ditemukan.');
        }

        $informasi->judul = $request->judul;
        $informasi->deskripsi = $request->deskripsi;
        $informasi->tanggal = now();
        $informasi->save();

        return redirect()->route('guru.informasi.index')->with('success', 'Informasi berhasil diperbarui.');
    }
    public function delete($id){
        $informasi = Informasi::find($id);
        $informasi->delete();
        return redirect()->route('guru.informasi.index')->with('success', 'Informasi berhasil dihapus.');
    }
}
