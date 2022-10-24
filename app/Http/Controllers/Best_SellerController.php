<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Best_seller;
use Illuminate\Support\Str;

class Best_SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = DB::table('best_sellers')->get();
        return view('best_seller.index',["menus" =>$menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('best_seller.create');
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

            'image.*' => ['required', 'image', 'mimes:jpg,png,jpeg','max:2048'],
        ]);
        

        $dateText = Str::random(12);
    
        $member = new Best_seller;
        $dateImg = [];
            if($request->hasFile('image')){
                $imagefile = $request->file('image');
               /*  $image->move(public_path().'/images/product',$dateText."".$image->getClientOriginalName()); */
                foreach ($imagefile as $image) {
                  $data =   $image->move(public_path().'/images/home',$dateText."".$image->getClientOriginalName());
                  $dateImg[] =  $dateText."".$image->getClientOriginalName();
                }
            }

        $member->images = json_encode($dateImg);


         $member->save();

        return redirect('best-seller')->with('message', "เพิ่ม สินค้าขายดี เรียบร้อย" );
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
        $image = Best_seller::find($id); 
        return view('best_seller.edit',['image' => $image]);
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
        $dateText = Str::random(12);
      

        $member =  Best_seller::find($id);
        $img = json_decode($member->images);
        foreach( $img as $image) {
            $image_path = public_path().'/images/home/'.$image; 
            unlink($image_path);
        }

        $dateImg = [];
        if($request->hasFile('image')){
            $imagefile = $request->file('image');
            foreach ($imagefile as $image) {
              $data =   $image->move(public_path().'/images/home',$dateText."".$image->getClientOriginalName());
              $dateImg[] =  $dateText."".$image->getClientOriginalName();
            }
        }
        $member->images = json_encode($dateImg);
        $member->save();

        return redirect('best-seller')->with('message', "เเก้ไข สินค้าขายดี เรียบร้อย" );
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
