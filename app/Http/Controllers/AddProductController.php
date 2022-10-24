<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Add_Product;
use Illuminate\Support\Str;
use Cookie;

class AddProductController extends Controller
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

    public function index(Request $request) {
        $search =  $request->search;
         $menus = DB::table('add__products');

         if ($search) {
            $menus = $menus->leftJoin('main__menus', 'add__products.id_main_menu', '=', 'main__menus.id')
            ->leftJoin('sub__menus', 'add__products.id_main_menu', '=', 'sub__menus.id')
            ->select('main__menus.id','sub__menus.sub_menu','sub__menus.id_main_menu','main__menus.main_menu','add__products.*')
            ->orWhere('product_name', 'like', "$search%")
            ->orWhere('sub_menu', 'like', "$search%")
            ->orWhere('main_menu', 'like', "$search%")
            ->orWhere('status_product', 'like', "$search%")
            ->orderBy('add__products.id', 'desc')
            ->get();
         }else{
            $menus = $menus->leftJoin('main__menus', 'add__products.id_main_menu', '=', 'main__menus.id')
            ->select('main__menus.main_menu','add__products.*')
            ->orderBy('add__products.id', 'desc')
            ->paginate(100);
         }
         Cookie::queue('count_product',  $menus->count());

        return view('add_product.index', ['menus' => $menus]);
    }

    public function getSubManu($id) {
        $groups = DB::table('sub__menus')
            ->where('id', $id)
            ->get();
        return   $groups[0]->sub_menu;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = DB::table('main__menus')
        ->get();


        return view('add_product.create', ['menus' => $menus]);
    }

    public function get_sub_menu(Request $request)
    {
        $id = $request->id;

        $job_systems = DB::table('sub__menus')
            ->where('id_main_menu', $id)
            ->get();

     


        return   $job_systems; 
    }

    public function get_sub_menu_edit(Request $request)
    {
        $id = $request->id;
        $id_product = $request->id_product;

        $products = DB::table('add__products')
        ->where('id', $id_product)
        ->get();
        $products = $products[0]->id_sub_menu;
    
        $job_systems = DB::table('sub__menus')
            ->where('id_main_menu', $id)
            ->get();

     
        $data = [$products,$job_systems];

        return   $data; 
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
            'product_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'image.*' => ['required', 'image', 'mimes:jpg,png,jpeg','max:2048'],
            /* 'image' => ['required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'], */
        ]);
      
        $dateText = Str::random(12);
      

        $member = new Add_Product;
        $member->id_main_menu = $request['id_main_menu'];
        $member->id_sub_menu = $request['id_sub_menu'];
        $member->product_name = $request['product_name'];
        $member->price = $request['price'];
        $member->name_details = $request['name_details'];
        $member->name_details_more = $request['name_details_more'];
        $member->status_product = $request['status_product'];
        $member->discount = $request['discount'];
        $member->price_discount = $request['price_discount'];
        
        $dateImg = [];
            if($request->hasFile('image')){
                $imagefile = $request->file('image');
               /*  $image->move(public_path().'/images/product',$dateText."".$image->getClientOriginalName()); */
                foreach ($imagefile as $image) {
                  $data =   $image->move(public_path().'/images/product',$dateText."".$image->getClientOriginalName());
                  $dateImg[] =  $dateText."".$image->getClientOriginalName();
                }
            }
    /*     dd($dateImg); */
        $member->images = json_encode($dateImg);
         $member->save();
         $menus = DB::table('add__products')->count();
        Cookie::queue('count_product', $menus);

        return redirect('create-peoduct')->with('message', "เพิ่ม สินค้า ".$request['product_name']." เรียบร้อย" );
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
        $menus = DB::table('main__menus')
        ->get();
        $product = Add_Product::find($id); //ลบภาพในdb

        return view('add_product.edit', ['menus' => $menus,'product' => $product]);
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
      

        $member =  Add_Product::find($id);
        $member->id_main_menu = $request['id_main_menu'];
        $member->id_sub_menu = $request['id_sub_menu'];
        $member->product_name = $request['product_name'];
        $member->price = $request['price'];
        $member->name_details = $request['name_details'];
        $member->name_details_more = $request['name_details_more'];
        $member->status_product = $request['status_product'];
        $member->discount = $request['discount'];
        $member->price_discount = $request['price_discount'];
        
 

        $dateImg = [];
        if($request->hasFile('image')){
            $img = json_decode($member->images);
            foreach( $img as $image) {
                $image_path = public_path().'/images/product/'.$image; 
                unlink($image_path);
            }
            $imagefile = $request->file('image');
           /*  $image->move(public_path().'/images/product',$dateText."".$image->getClientOriginalName()); */
            foreach ($imagefile as $image) {
              $data =   $image->move(public_path().'/images/product',$dateText."".$image->getClientOriginalName());
              $dateImg[] =  $dateText."".$image->getClientOriginalName();
            }
            $member->images = json_encode($dateImg);
        }
/*     dd($dateImg); */
   


        $member->save();

        return redirect('home')->with('message', "เเก้ไข สินค้า ".$request['product_name']." เรียบร้อย" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = Add_Product::find($id);
        $img = $data->images;

        $name = $data->product_name;
        
        $img = json_decode($data->images);
        foreach( $img as $image) {
            $image_path = public_path().'/images/product/'.$image; 
            unlink($image_path);
        }
       /*  $image_path = public_path().'/images/product/'.$img; 
        unlink($image_path); */

        $data->delete();

        return redirect('home')->with('message', "ลบ สินค้า ".$name." เรียบร้อย" );
    }
}
