<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Logo;
use App\Models\Banner;
use App\Models\ContactCard;
use App\Models\Feature;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Work;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function home() {

        $menus = Menu::all();
        $logo = Logo::where('status' , 1 )->get();
        $banner = Banner::first();
        $features = Feature::all();
        $services = Service::all();
        $works = Work::all();
        $skills = Skill::all();
        $card = ContactCard::first();
         return view('welcome' ,[
            'menus'=>$menus,
            'logo'=>$logo,
            'banner'=>$banner,
            'features'=>$features,
            'services'=>$services,
            'works'=>$works,
            'skills'=>$skills,
            'card'=>$card ,
         ]);
    }
}
