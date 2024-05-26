<?php

namespace App\Http\Controllers;

use App\Models\Meter;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MeterController extends Controller
{
    function meter(){
        $meters = Meter::latest()->get();
        $latest_meter = Meter::latest()->get()->first();
        return view('backend.meter.meter' , compact('meters','latest_meter'));
    }

    function meter_store(Request $request){
        $request->validate([
            'meter_no'=>"required",
            'recharge'=>"required",
            'date'=>"required",
            'cash'=>"required",
        ]);

        if(!$request->comment){
            Meter::create([
                'meter_no'=>$request->meter_no,
                'recharge'=>$request->recharge,
                'date'=>$request->date,
                'cash'=>$request->cash,
                'created_at'=>Carbon::now(),
            ]);
            return back();
        }
        else{
            Meter::create([
                'meter_no'=>$request->meter_no,
                'recharge'=>$request->recharge,
                'date'=>$request->date,
                'cash'=>$request->cash,
                'comment'=>$request->comment,
                'created_at'=>Carbon::now(),
            ]);

            return back();
        }
    }
}
