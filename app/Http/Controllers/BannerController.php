<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    function banner(){
        $banner = Banner::first();
        return view('backend.banner.banner' , compact('banner'));
    }

    function banner_update(Request $request, $id){


        if($request->photo == null){

            Banner::find($id)->update([
                'subtitle'=>$request->subtitle,
                'title'=>$request->title,
                'name'=>$request->name,
                'description'=>$request->description,
                'updated_at'=>Carbon::now(),
            ]);

            return back()->with('updated' , 'Banner Updated !');
        }

        else{

            $banner =  Banner::find($id);
            $current_img = public_path('uploads/banner/'.$banner->photo);
            unlink($current_img);

            $photo = $request->photo;
            $extension = $photo->extension();
            $file_name = 'banner'.'.'.$extension;

            Image::make($photo)->save(public_path('uploads/banner/'.$file_name));
            Banner::find($id)->update([
                'subtitle'=>$request->subtitle,
                'title'=>$request->title,
                'name'=>$request->name,
                'description'=>$request->description,
                'photo'=>$file_name,
                'updated_at'=>Carbon::now(),
            ]);

            return back()->with('updated' , 'Banner Updated !');
        }

    }
}
