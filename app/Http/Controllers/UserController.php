<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    function user_profile(){
        return view('backend.user.profile');
    }

    function user_info_update(Request $request){

        User::find(Auth::id())->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'updated_at'=>Carbon::now(),
        ]);

        return back()->with('updated' , "User Info Updated");
    }

    function password_update(Request $request){

        $request->validate([
            'current_password'=>'required',
            'password'=>[
                'required','confirmed',Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
            ],
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
        ]);
        // print_r($request->all());
        $user = User::find(Auth::id());
        if(Hash::check($request->current_password, $user->password)){
            User::find(Auth::id())->update([
                'password'=>bcrypt($request->password),

               ]);
               return back()->with('pass_update','Password Updated');
        }
        else{
            return back()->with('wrong','Current Password Wrong');
        }


    }


    function photo_update(Request $request){

        $request->validate([
            'profile_photo'=>'required|image|mimes:jpg,png|file|max:1024',

        ]);

        if(Auth::user()->photo == null){

            $photo = $request->profile_photo;
            $extension = $photo->extension();
            $file_name = Auth::id().'.'.$extension;

            Image::make($photo)->save(public_path('uploads/user/'.$file_name));
            User::find(Auth::id())->update([
                'photo'=>$file_name,
            ]);

            return back()->with('photo_updated' , 'Photo Updated !');
        }

        else{
            $current_img = public_path('uploads/user/'.Auth::user()->photo);
            unlink($current_img);

            $photo = $request->profile_photo;
            $extension = $photo->extension();
            $file_name = Auth::id().'.'.$extension;

            Image::make($photo)->save(public_path('uploads/user/'.$file_name));
            User::find(Auth::id())->update([
                'photo'=>$file_name,
            ]);

            return back()->with('photo_updated' , 'Photo Updated !');
        }



    }


    function user_list(){

        $users = User::where('id', '!=', Auth::id())->get();
        // $users = User::where('id', '!=', 1)->get(); // for role


        return view('backend.user.user_list' , compact('users'));
    }

    function user_delete($id){
        User::find($id)->delete();

        return back()->with('delete' , "User Deleted Success !");
    }

    function user_edit_view($id){
        $specefic_user = User::find($id);
        $users = User::where('id', '!=', Auth::id())->get();

        return view('backend.user.user_edit_view' , [
            'specefic_user'=>$specefic_user,
            'users'=>$users,
        ]);
    }

    function user_add(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'password'=>Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols(),
            'confirm_password'=>'required',
        ]);
        if($request->password != $request->confirm_password){
            return back()->with('match','Password & confirm password dose not match !');
        }

        // User::insert([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'password'=>bcrypt($request->password),
        //     'role'=>$request->role,
        //     'created_at'=>Carbon::now(),
        //     'email_verified_at'=>Carbon::now(),
        // ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>bcrypt($request->password),
            'created_at'=>Carbon::now(),
            // 'email_verified_at'=>Carbon::now(),
        ]);

        event(new Registered($user));
        return back()->with('success', 'User add success');
    }

    function user_update(Request $request, $id){

        $request->validate([
            'name'=>'required',
            'email'=>'required',

        ]);

        if(!$request->password){
            User::find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'updated_at'=>Carbon::now(),
            ]);

            return redirect()->route('user.list')->with('update', "User Info Updated !");
        }
        else{
            User::find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'updated_at'=>Carbon::now(),
            ]);

            return redirect()->route('user.list')->with('update', "User Info Updated !");
        }
    }
}
