<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class WorkController extends Controller
{
    function work(){
        $works = Work::all();
        return view('backend.work.work' , compact('works'));
    }

    function work_store(Request $request){
        $request->validate([
            'title'=>'required',
            'link'=>'required',
            'photo'=>'required|image',
        ]);

        $photo = $request->photo;
        $ext =$photo->extension();
        $file_name =$request->title.'.'.$ext;
        Image::make($photo)->save(public_path('uploads/work/'.$file_name));

        Work::create([
            'title'=>$request->title,
            'link'=>$request->link,
            'photo'=>$file_name,
        ]);
        return back()->with('success' , 'Work Added Success!');
    }

    function work_delete($id){
        Work::find($id)->delete();

        return back()->with('delete' , 'Work Deleted Success!');
    }

    function work_edit_view($id){
        $work = Work::find($id);

        return view('backend.work.work_edit' , compact('work'));

    }

    function work_update(Request $request, $id){


        if($request->photo == null){

            Work::find($id)->update([
                'title'=>$request->title,
                'link'=>$request->link,
                'updated_at'=>Carbon::now(),
            ]);

            return redirect()->route('work')->with('update' , 'Work Updated !');
        }

        else{

            $work =  Work::find($id);
            $current_img = public_path('uploads/work/'.$work->photo);
            unlink($current_img);

            $photo = $request->photo;
            $extension = $photo->extension();
            $file_name = $request->title.'.'.$extension;

            Image::make($photo)->save(public_path('uploads/work/'.$file_name));
            Work::find($id)->update([

                'title'=>$request->title,
                'link'=>$request->link,
                'photo'=>$file_name,
                'updated_at'=>Carbon::now(),
            ]);

            return redirect()->route('work')->with('update' , 'Work Updated !');
        }

    }
}
