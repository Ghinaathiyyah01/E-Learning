<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Modul;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index(){
        $mapel = Mapel::all();
        return view('modul.index', compact('mapel'));
    }
    public function materi($id){
        // Mengambil modul berdasarkan id mapel
        $modul = Modul::where('mapel_id', $id)->get();
    
        // Mengambil nama mapel dan deskripsi
        $mapel = Mapel::find($id);
        $nama_mapel = $mapel->nama;
        $deskripsi_mapel = $mapel->deskripsi();
    
        return view('modul.materi', compact('modul', 'nama_mapel', 'deskripsi_mapel'));
    }
}
