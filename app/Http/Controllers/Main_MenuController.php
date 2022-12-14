<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\Main_Menu;

class Main_MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $search =  $request->search;

        
        $menus = DB::table('main__menus')
        ->orWhere('main_menu', 'like', "$search%");

        if ($search) {
            $menus = $menus->orderBy('main__menus.sort_manu','ASC')->get();
        }else{
            $menus =  $menus->orderBy('main__menus.sort_manu','ASC')
            ->paginate(100); 
        }
        return view('menu.main_menu.index',['menus' => $menus] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('menu.main_menu.create' );
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
            'main_menu' => ['required', 'string', 'max:255'],
        ]);
        $member = new Main_Menu;
        $member->main_menu = $request['main_menu'];
      /*   $member->sort_manu = "asdas"; */
/*         dd($member->id); */
        $member->save();
        $affected = DB::table('main__menus')
        ->where('id', $member->id)
        ->update(
            ['sort_manu' => $member->id]
          );

        return redirect('create-main-menu')->with('message', "เพิ่ม เมนู ".$request['main_menu']." เรียบร้อย" );
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
        $menu = Main_Menu::find($id); //ลบภาพในdb
        return view('menu.main_menu.edit',['menu' => $menu] );
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

        $member = Main_Menu::find($id);
        $member->main_menu = $request['main_menu'];
        $member->save();
        return redirect('main-menu')->with('message', "เเก้ไข เมนู ".$request['main_menu']." เรียบร้อย" );
    }


    public function sort_manu(Request $request, $id)
    {
     /*  dd($id,$request->sort_manu); */
      $affected = DB::table('main__menus')
      ->where('id', $id)
      ->update(
          ['sort_manu' => $request->sort_manu]
        );
        $namu =  DB::table('main__menus')
        ->where('id', $id)
        ->get();
        $namu = $namu[0]->main_menu;
     /*    dd($namu[0]->main_menu); */
        return redirect('main-menu')->with('message', "เปลี่ยน $namu เป็น ลำดับ $request->sort_manu เรียบร้อย");
/*         return view('menu.main_menu.create' ); */
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flight = Main_Menu::find($id); //ลบภาพในdb
        $flight->delete();
        $deleted = DB::table('sub__menus')->where('id_main_menu', $id)->get();
        if ($deleted->count() != 0) {
            foreach ($deleted as $menu) {
                $subMenu = DB::table('sub__menus')->where('id', $menu->id)->delete();
            }
        }
        
        $name = $flight->main_menu;
    /*     $data->delete(); */

        return redirect('main-menu')->with('message', "ลบ เมนู  $name เรียบร้อย" );
    }
}
