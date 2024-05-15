<?php

namespace App\Http\Controllers;

use App\Models\Kalender;
use Illuminate\Http\Request;

class KalenderController extends Controller
{
    public function index(){
        $calender = Kalender::all();
        return view('user.kalender', compact('calender'));
    }
}
