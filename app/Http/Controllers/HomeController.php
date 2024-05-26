<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Logo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function dashboard(){


        return view('dashboard');
    }
}
