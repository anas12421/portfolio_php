<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    function feature(){
        $features = Feature::all();
        return view('backend.feature.feature' , compact('features'));
    }

    function feature_store(Request $request){
        $request->validate([
            'icon'=>"required",
            'title'=>"required",
            'description'=>"required",
        ]);

        Feature::create([
            'icon'=>$request->icon,
            'title'=>$request->title,
            'description'=>$request->description,
            'created_at'=>Carbon::now()
        ]);

        return back()->with('success' , 'Feature Stored Success !');
    }

    function feature_delete($id){
        Feature::find($id)->delete();

        return back()->with('delete' , 'Feature Deleted Success !');
    }

    function feature_edit_view($id){
        $feature = Feature::find($id);
        return view('backend.feature.feature_edit' , compact('feature'));
    }

    function feature_update(Request $request, $id){
        Feature::find($id)->update([
            'icon'=>$request->icon,
            'title'=>$request->title,
            'description'=>$request->description,
            'updated_at'=>Carbon::now(),
        ]);

        return redirect()->route('feature')->with('update' , 'Feature Updated');
    }
}
