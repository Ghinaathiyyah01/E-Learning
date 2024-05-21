<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $role=Auth()->user()->role;

            if($role=='user')
            {
                return view('user.home');
            }

            elseif($role=='admin')
            {
                return view('guru.home');
            }

            else{
                return redirect()->back();
            }
        }
    }
}
