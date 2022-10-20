<?php

namespace App\Http\Controllers;
use App\Models\Web_Name;
use DB;
use Illuminate\Http\Request;

class Web_NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webName = DB::table('web__names')->get();
        return view('web_name.website', ['webName'=> $webName]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web_name.create_website_name');
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
            'web_names' => ['required', 'string', 'max:255'],
        ]);
        $member = new Web_Name;
        $member->web_names = $request['web_names'];
        $member->save();

        return redirect('web-name')->with('message', "เพิ่ม ชื่อเว็บไชต์ ".$request['web_names']." เรียบร้อย" );
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
        $webName = Web_Name::find($id);
        return view('web_name.edit_website_name',['webName'=>$webName]);
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
        $member = Web_Name::find($id);
        $member->web_names = $request['web_names'];
        $member->save();
        return redirect('web-name')->with('message', "เพิ่ม ชื่อเว็บไชต์ ".$request['main_menu']." เรียบร้อย" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
