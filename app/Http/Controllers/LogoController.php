<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    function logo(){
        $logos = Logo::all();
        return view('backend.logo.logo' , compact('logos'));
    }

    function logo_store(Request $request){

        if(!$request->photo){
           Logo::create([
            'name'=>$request->name,
            'status'=>0,
            'created_at'=>Carbon::now(),
           ]);

           return back()->with('success' , 'Logo Added Success');
        }
        else{
            $photo = $request->photo;
            $extension = $photo->extension();
            $file_name = 'logo'.uniqid().'.'.$extension;

            Image::make($photo)->save(public_path('uploads/logo/'.$file_name));

            Logo::create([
                'photo'=>$file_name,
                'status'=>0,
                'created_at'=>Carbon::now(),
               ]);

            return back()->with('success' , 'Logo Added Success');
        }


    }

    function logo_delete($id){

        $logo =  Logo::find($id);
        $current_img = public_path('uploads/logo/'.$logo->photo);
        unlink($current_img);

        Logo::find($id)->delete();

        return back()->with('delete' , 'Logo Deleted');
    }

    function logo_status($id){
        $status = Logo::find($id);

        if($status->status == 0){
            Logo::find($id)->update([
                'status'=>1,
            ]);
            return back();
        }
        else{
            Logo::find($id)->update([
                'status'=>0,
            ]);
            return back();
        }
    }
}



