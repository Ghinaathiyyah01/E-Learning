<?php

namespace App\Http\Controllers;

use App\Charts\GuruChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(GuruChart $guruchart)
    {
        $guruchart = $guruchart->build();
        if(Auth::id())
        {
            $role=Auth()->user()->role;

            if($role=='user')
            {
                return view('user.home');
            }

            elseif($role=='admin')
            {
                return view('guru.home', compact('guruchart'));
            }

            else{
                return redirect()->back();
            }
        }
    }
}
