<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagories;
use DB;

class CatagoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagories = DB::table('catagories')->get();
        return view('catagories.index',['catagories' => $catagories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catagories.create');
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
            'catagorie' => ['required', 'string', 'max:255'],
        ]);
        $member = new Catagories;
        $member->catagorie = $request['catagorie'];
        $member->save();

        return redirect('catagories')->with('message', "เพิ่ม หัวข้อเมนู ".$request['catagorie']." เรียบร้อย" );
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
        $catagories = Catagories::find($id);
        return view('catagories.edit',['catagories'=>$catagories]);
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
        $validated = $request->validate([
            'catagorie' => ['required', 'string', 'max:255'],
        ]);

        $member = Catagories::find($id);;
        $member->catagorie = $request['catagorie'];
        $member->save();

        return redirect('catagories')->with('message', "เเก้ไข หัวข้อเมนู ".$request['catagorie']." เรียบร้อย" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Catagories::find($id);
        $manu = $member->catagorie;
        $member->delete();

        return redirect('catagories')->with('message', "ลบ หัวข้อเมนู $manu เรียบร้อย" );
    }
}
