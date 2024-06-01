<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Modul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MapelController extends Controller
{
    public function index(){
        $mapel = Mapel::all();
        return view('user.modul.index', compact('mapel'));
    }
    public function materi($id){
        // Mengambil modul berdasarkan id mapel
        $modul = Modul::where('mapel_id', $id)->get();
    
        // Mengambil nama mapel dan deskripsi
        $mapel = Mapel::find($id);
        $nama_mapel = $mapel->nama;
        $deskripsi_mapel = $mapel->deskripsi();
    
        return view('user.modul.materi', compact('modul', 'nama_mapel', 'deskripsi_mapel'));
    }
    public function indexGuru(Request $request){
        $cari = $request->query('cari');
    
        if (!empty($cari)) {
            $mapel = Mapel::where('nama', 'like', '%' . $cari . '%')
                ->get();
        } else {
            $mapel = Mapel::simplepaginate(2);
        }
    
        return view('guru.modul.index', compact('mapel','cari'));
    }
    public function create()
    {
        return view('guru.modul.create');
    }
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Menyimpan file gambar
        if ($request->hasFile('gambar')) {
            $gambar_file = $request->file('gambar');
            $gambar_nama = time() . '_' . $gambar_file->getClientOriginalName();
            $gambar_file->move(public_path('Mapel Gambar'), $gambar_nama);
            $data['gambar'] = $gambar_nama;
        } else {
            return back()->withErrors(['gambar' => 'Gambar tidak ditemukan.']);
        }
    
        // Menambahkan user_id ke data yang akan disimpan
        $loggedInUser = Auth::user();

// Mengatur nilai 'user_id' di dalam $data dengan nilai user_id pengguna yang login
$data['user_id'] = $loggedInUser->id; // Set default user_id menjadi 1
    
        // Membuat instance Mapel dan menyimpan data
        // dd($data);
        $mapel = Mapel::create($data);

        return redirect('/guru-modul')->with('success', 'Lapangan berhasil ditambahkan');
    }
    public function edit($id)
    {
        $map = Mapel::find($id);
        return view('guru.modul.update', compact(['map']));
    }
    public function update(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Cari data Mapel yang akan diupdate
        $mapel = Mapel::findOrFail($id);

        // Memperbarui nama dan deskripsi
        $mapel->nama = $request->nama;
        $mapel->deskripsi = $request->deskripsi;

        // Jika ada file gambar baru diunggah, simpan gambar baru
        if ($request->hasFile('gambar')) {
            $gambar_file = $request->file('gambar');
            $gambar_nama = time() . '_' . $gambar_file->getClientOriginalName();
            $gambar_file->move(public_path('Mapel Gambar'), $gambar_nama);
            $mapel->gambar = $gambar_nama;
        }

        // Simpan perubahan
        $mapel->save();

        // Redirect atau tampilkan pesan berhasil
        return redirect()->route('guru.modul.index')->with('success', 'Modul berhasil diperbarui');
    }
    public function delete($id){
        $mapel = Mapel::find($id);
        $mapel->delete();
        return redirect()->route('guru.modul.index')->with('success', 'Informasi berhasil dihapus.');
    }
}
