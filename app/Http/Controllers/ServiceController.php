<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function service(){
        $services = Service::all();
        return view('backend.service.service' , compact('services'));
    }

    function service_store(Request $request){
        $request->validate([
            'icon'=>"required",
            'title'=>"required",
            'description'=>"required",
        ]);

        Service::create([
            'icon'=>$request->icon,
            'title'=>$request->title,
            'description'=>$request->description,
            'created_at'=>Carbon::now()
        ]);

        return back()->with('success' , 'Service Stored Success !');
    }

    function service_delete($id){
        Service::find($id)->delete();

        return back()->with('delete' , 'Service Deleted Success !');
    }

    function service_edit_view($id){
        $service = Service::find($id);
        return view('backend.service.service_edit' , compact('service'));
    }

    function service_update(Request $request, $id){
        Service::find($id)->update([
            'icon'=>$request->icon,
            'title'=>$request->title,
            'description'=>$request->description,
            'updated_at'=>Carbon::now(),
        ]);

        return redirect()->route('service')->with('update' , 'Service Updated');
    }
}
