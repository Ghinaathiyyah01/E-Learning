<?php

namespace App\Http\Controllers;

use App\Charts\GuruChart;
use App\Models\Informasi;
use App\Models\Modul;
use App\Models\Nilai;
use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index()
    {
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

        // Define colors based on ujian_nama
        $colorsByUjianNama = [
            'Ujian Tengah Semester' => '#ffab00', // Yellow for Ujian Tengah Semester
            'Ujian Akhir Semester' => '#007bff', // Blue for UAS
            'Kuis 1' => '#71dd37', // Green for Ujian 3
            // Add more colors as needed
        ];

        $outputData = [];

        foreach ($result as $ujianId => $nilaiGroup) {
            $ujianNama = $nilaiData->firstWhere('ujian_id', $ujianId)->ujian_nama;
            $color = $colorsByUjianNama[$ujianNama] ?? '#8592a3'; // Default color if no match found

            // Ensure the outputData has an entry for this ujian_nama
            if (!isset($outputData[$ujianNama])) {
                $outputData[$ujianNama] = [];
            }

            // Convert the keys (nilai) to integers for sorting
            $nilaiGroup = new Collection($nilaiGroup->toArray());
            $nilaiGroup = $nilaiGroup->sortBy(function ($value, $key) {
                return (int) $key; // Convert to integer for sorting
            });

            foreach ($nilaiGroup as $nilai => $count) {
                $outputData[$ujianNama][] = [
                    'x' => 'Nilai ' . $nilai,
                    'y' => $count,
                    'color' => $color,
                ];
            }
        }

        if (Auth::id()) {
            $role = Auth()->user()->role;

            if ($role == 'user') {
                $jumlahInformasi = Informasi::count();

                // Menghitung jumlah modul
                $jumlahModul = Modul::count();

                // Menghitung jumlah ujian
                $jumlahUjian = Ujian::count();
                return view('user.home', compact('jumlahInformasi', 'jumlahModul', 'jumlahUjian'));
            } elseif ($role == 'admin') {
                return view('guru.home', ['result' => $outputData]);
            } else {
                return redirect()->back();
            }
        }
    }
}
