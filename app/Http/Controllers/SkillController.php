<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    function skill(){
        $skills = Skill::all();
        return view('backend.skill.skill' , compact('skills'));
    }

    function skill_store(Request $request){
        $request->validate([
            'name'=>'required',
            'percentage'=>'required',
        ]);

        Skill::create([
            'name'=>$request->name,
            'percentage'=>$request->percentage,
        ]);

        return back()->with('success' , 'Skill Added !');
    }

    function skill_delete($id){
        Skill::find($id)->delete();

        return back()->with('delete' , 'Skill Deleted Success!');
    }

    function skill_edit_view($id){
        $skill = Skill::find($id);

        return view('backend.skill.skill_edit' , compact('skill'));
    }

    function skill_update(Request $request, $id){

        $request->validate([
            'name'=>'required',
            'percentage'=>'required',
        ]);

        Skill::find($id)->update([
            'name'=>$request->name,
            'percentage'=>$request->percentage,
        ]);

        return redirect()->route('skill')->with('update' ,  'Skill Updated');

    }
}
