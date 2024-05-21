<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = User::where('role', 'user')->get();
        return view('guru.Data Siswa.index', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = User::find($id);
        return view('guru.Data Siswa.update', compact(['siswa']));
    }

    public function update(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string'
        ]);

        // Cari data Mapel yang akan diupdate
        $siswa = User::findOrFail($id);

        // Memperbarui nama dan deskripsi
        $siswa->name = $request->name;
        $siswa->email = $request->email;

        // Simpan perubahan
        $siswa->save();

        // Redirect atau tampilkan pesan berhasil
        return redirect()->route('guru.data-siswa.index')->with('success', 'Data Siswa berhasil diperbarui');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('guru.Data Siswa.index')->with('success', 'Data Siswa berhasil dihapus.');
    }
}
