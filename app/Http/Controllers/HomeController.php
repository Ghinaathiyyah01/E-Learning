<?php

namespace App\Http\Controllers;

use App\Charts\GuruChart;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(GuruChart $guruchart)
    {
        $guruchart = $guruchart->build();

        $nilaiData = DB::table('nilais')
            ->join('ujians', 'nilais.ujian_id', '=', 'ujians.id')
            ->select('nilais.ujian_id', 'nilais.nilai', 'ujians.nama as ujian_nama')
            ->orderBy('nilais.ujian_id')
            ->get();

        $result = $nilaiData->groupBy('ujian_id')->map(function ($group) {
            return $group->groupBy('nilai')->map(function ($nilaiGroup) {
                return $nilaiGroup->count();
            });
        });

        // Definisikan warna berdasarkan ujian_nama
        $colorsByUjianNama = [
            'Ujian Tengah Semester' => '#ffab00', // Contoh: Warna kuning untuk Ujian 1
            'uas' => '#007bff', // Contoh: Warna biru untuk Ujian 2
            'Ujian 3' => '#71dd37', // Contoh: Warna hijau untuk Ujian 3
            // Tambahkan lebih banyak warna sesuai kebutuhan
        ];

        $outputData = [];

        foreach ($result as $ujianId => $nilaiGroup) {
            $ujianNama = $nilaiData->firstWhere('ujian_id', $ujianId)->ujian_nama;
            $color = $colorsByUjianNama[$ujianNama] ?? '#8592a3'; // Default color if no match found
            foreach ($nilaiGroup as $nilai => $count) {
                $outputData[] = [
                    'x' => 'Nilai ' . $nilai. ' : ' .$ujianNama ,
                    'y' => $count,
                    'color' => $color,
                ];
            }
        }

        // echo json_encode(['data' => $outputData], JSON_PRETTY_PRINT);
        // dd($outputData);
        // // dd($proges);
        // return view('landing-page', ['result' => $outputData]);
        if (Auth::id()) {
            $role = Auth()->user()->role;

            if ($role == 'user') {
                return view('user.home');
            } elseif ($role == 'admin') {
                return view('guru.home', ['result' => $outputData]);
            } else {
                return redirect()->back();
            }
        }
    }
}
