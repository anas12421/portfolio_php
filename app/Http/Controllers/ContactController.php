<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactCard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ContactController extends Controller
{
    function contact_card(){
        $card = ContactCard::all()->first();
        return view('backend.contact.contact_card' , compact('card'));
    }

    function contact_card_update(Request $request , $id){

        // $request->validate([
        //     'name'=>'required',
        //     'title'=>'required',
        //     'description'=>'required',
        //     'number'=>'required',
        //     'email'=>'required',
        //     'photo'=>'required',
        // ]);

        if($request->photo == null){

            ContactCard::find($id)->update([
                'name'=>$request->name,
                'title'=>$request->title,
                'description'=>$request->description,
                'number'=>$request->number,
                'email'=>$request->email,
                'fb'=>$request->fb,
                'tw'=>$request->tw,
                'in'=>$request->in,
                'pi'=>$request->pi,
                'tw'=>$request->tw,
                'updated_at'=>Carbon::now(),
            ]);

            return back()->with('update' , 'Contact Card Updated !');
        }

        else{

            $card =  ContactCard::find($id);
            $current_img = public_path('uploads/contact_card/'.$card->photo);
            unlink($current_img);

            $photo = $request->photo;
            $extension = $photo->extension();
            $file_name = 'contact_card'.'.'.$extension;

            Image::make($photo)->save(public_path('uploads/contact_card/'.$file_name));
            ContactCard::find($id)->update([
                'name'=>$request->name,
                'title'=>$request->title,
                'description'=>$request->description,
                'number'=>$request->number,
                'email'=>$request->email,
                'fb'=>$request->fb,
                'tw'=>$request->tw,
                'in'=>$request->in,
                'pi'=>$request->pi,
                'tw'=>$request->tw,
                'photo'=>$file_name,
                'updated_at'=>Carbon::now(),
            ]);


            return back()->with('update' , 'Contact Card Updated !');
        }
    }

    function contact_store(Request $request){
        $request->validate([
            'name'=>'required',
            'number'=>'required',
            'email'=>'required',
        ]);

        Contact::create([
            'name'=>$request->name,
            'number'=>$request->number,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ]);

        return back()->with('send' , 'Message Send Success!');
    }

    function contact_list(){
        $contacts = Contact::latest()->get();
        return view('backend.contact.contact_list' , compact('contacts'));
    }
}
