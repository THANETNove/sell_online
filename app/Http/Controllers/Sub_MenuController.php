<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sub_Menu;

class Sub_MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = DB::table('sub__menus')
        ->leftJoin('main__menus', 'sub__menus.id_main_menu', '=', 'main__menus.id')
        ->select('main__menus.id','main__menus.main_menu','sub__menus.id','sub__menus.id_main_menu','sub__menus.sub_menu')
        ->paginate(100);
        return view('menu.sub_menu.index',['menus'=>$menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = DB::table('main__menus')
        ->get();
        return view('menu.sub_menu.create',['menu' => $menu] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'id_main_menu' => ['required', 'string', 'max:255'],
            'sub_menu' => ['required', 'string', 'max:255'],
        ]);
        $member = new Sub_Menu;
        $member->id_main_menu = $request['id_main_menu'];
        $member->sub_menu = $request['sub_menu'];
        $member->save();

        return redirect('sub-menu')->with('message', "เพิ่ม เมนู ".$request['sub_menu']." เรียบร้อย" );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = DB::table('main__menus')
        ->get();
        $sub = Sub_Menu::find($id); //ลบภาพในdb


        return view('menu.sub_menu.edit',['menu' => $menu, 'sub' => $sub] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = Sub_Menu::find($id);
        $member->id_main_menu = $request['id_main_menu'];
        $member->sub_menu = $request['sub_menu'];
        $member->save();
        return redirect('sub-menu')->with('message', "เเก้ไข เมนู ".$request['sub_menu']." เรียบร้อย" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flight = Sub_Menu::find($id); //ลบภาพในdb
        $flight->delete();
        return redirect('sub-menu')->with('message', "ลบ เมนู เรียบร้อย" );
    }
}
