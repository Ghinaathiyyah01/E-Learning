<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    public function index(){
        $modul = Modul::all();
        return view('modul', compact('modul'));
    }
}
