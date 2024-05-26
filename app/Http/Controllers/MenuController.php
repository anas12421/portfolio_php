<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    function menu(){

        $menus = Menu::all();
        return view('backend.menu.menu',[
            'menus'=>$menus,
        ]);
    }

    function menu_store(Request $request){
        $request->validate([
            'menu_name'=>'required',
            'menu_link'=>'required',
        ]);

        Menu::create([
            'menu_name'=>$request->menu_name,
            'menu_link'=>'#'.$request->menu_link,
            'created_at'=>Carbon::now(),
        ]);

        return back()->with('success' , 'Menu Added Successfull');
    }

    function menu_delete($id){
        Menu::find($id)->delete();

        return back()->with('delete' , 'Menu Deleted Success');
    }

    function menu_edit_view($id){
        $menu = Menu::find($id);
        return view('backend.menu.edit', compact('menu'));
    }

    function menu_edit(Request $request, $id){
        $request->validate([
            'menu_name'=>'required',
            'menu_link'=>'required',
        ]);

        $menu = Menu::find($id)->update([
            'menu_name'=>$request->menu_name,
            'menu_link'=>$request->menu_link,
            'updated_at'=>Carbon::now(),
        ]);

        return redirect()->route('menu')->with('updated', 'Menu Updated Success !');

    }
}
