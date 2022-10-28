<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\addAdminController;
use App\Http\Controllers\Main_MenuController;
use App\Http\Controllers\Sub_MenuController;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\Web_NewController;
use App\Http\Controllers\CatagoriesController;
use App\Http\Controllers\Best_SellerController;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
/* use session; */
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = DB::table('add__products')
    ->where('status_product','=','สินค้าขายดี')
   /*  ->get(); */
   ->paginate(100);

    $webName = DB::table('web__names')
    ->get();
    $img_home = DB::table('best_sellers')
    ->get();
    $webName  = $webName[0]->web_names;

    $manu = DB::table('main__menus')
    ->get();

    $images = $img_home[0]->images;
    $images = json_decode($images);


    Session::put('web_name', $webName);
    return view('welcome',['products' => $products, 'images' => $images,'manu' => $manu]);
});

Route::post('/sort', function (Request $request) {
   $sort =  $request->searchSort;
   /*  dd($request->searchSort); */
    $products = DB::table('add__products')
    ->where('status_product','=','สินค้าขายดี');
    if ($sort == "AZ") {
        $products = $products->orderBy('add__products.product_name', 'ASC')
        ->paginate(100);
    }else{
        $products = $products->orderBy('add__products.product_name', 'DESC')
        ->paginate(100);
    }
   

    $webName = DB::table('web__names')
    ->get();
    $img_home = DB::table('best_sellers')
    ->get();
    $webName  = $webName[0]->web_names;

    $manu = DB::table('main__menus')
    ->get();

    $images = $img_home[0]->images;
    $images = json_decode($images);


    Session::put('web_name', $webName);
    return view('welcome',['products' => $products, 'images' => $images,'manu' => $manu]);
});


/**
 * !  shop */
Route::get('/shop', function () {
    $menus = DB::table('main__menus')
    ->orderBy('sort_manu', 'ASC')
        ->get();
    $submenus = DB::table('sub__menus')
        ->get();
    $catagories = DB::table('catagories')
        ->get();
    $products = DB::table('add__products')
    ->orderBy('add__products.id', 'desc')
    ->paginate(100);

    return view('shop',['menus' => $menus,'submenus'=> $submenus,'products' => $products,'catagories' => $catagories]);
});

Route::get('/search/{name}', function ($name) {

    $menus = DB::table('main__menus')
    ->orderBy('sort_manu', 'ASC')
        ->get();
    $submenus = DB::table('sub__menus')
        ->get();

    $products = DB::table('add__products')
        ->leftJoin('main__menus', 'add__products.id_main_menu', '=', 'main__menus.id')
        ->leftJoin('sub__menus', 'add__products.id_sub_menu', '=', 'sub__menus.id')
        ->orWhere('sub_menu', 'like', "$name%")
        ->orWhere('main_menu', 'like', "$name%")
        ->select('sub__menus.sub_menu','main__menus.main_menu','add__products.*')
       /*  ->orderBy('add__products.id', 'desc') */
        ->get();

    $catagories = DB::table('catagories')
        ->get();
    return view('shop',['menus' => $menus,'submenus'=> $submenus,'products' => $products, 'catagories'=> $catagories]); 
});

Route::post('/search', function (Request $request) {
    $search =  $request->search;

   /*  dd($search); */


    $menus = DB::table('main__menus')
    ->orderBy('sort_manu', 'ASC')
        ->get();
    $submenus = DB::table('sub__menus')
        ->get();

    $products = DB::table('add__products')
        ->leftJoin('main__menus', 'add__products.id_main_menu', '=', 'main__menus.id')
        ->leftJoin('sub__menus', 'add__products.id_sub_menu', '=', 'sub__menus.id');
        if ($search == "AZ") {
            $products =  $products
            ->select('sub__menus.sub_menu','main__menus.main_menu','add__products.*')
            ->orderBy('add__products.product_name', 'ASC')
            ->get();
            # code...
        }elseif($search == "ZA") {
            $products =  $products
            ->select('sub__menus.sub_menu','main__menus.main_menu','add__products.*')
            ->orderBy('add__products.product_name', 'DESC')
            ->get();
        }else{
            $products =  $products->orWhere('main_menu', 'like', "$search%")
            ->orWhere('sub_menu', 'like', "$search%")
            ->orWhere('product_name', 'like', "$search%")
            ->orWhere('price', 'like', "$search%")
            ->orWhere('price_discount', 'like', "$search%")
            ->orWhere('status_product', 'like', "$search%")
            ->select('sub__menus.sub_menu','main__menus.main_menu','add__products.*')
            ->orderBy('add__products.product_name', 'ASC')
            ->get();
        }
       /*  ->orWhere('main_menu', 'like', "$search%")
        ->orWhere('sub_menu', 'like', "$search%")
        ->orWhere('product_name', 'like', "$search%")
        ->orWhere('price', 'like', "$search%")
        ->orWhere('price_discount', 'like', "$search%")
        ->orWhere('status_product', 'like', "$search%")
        ->select('sub__menus.sub_menu','main__menus.main_menu','add__products.*')
        ->orderBy('add__products.id', 'desc')
        ->get(); */
    
    $catagories = DB::table('catagories')
            ->get();
    return view('shop',['menus' => $menus,'submenus'=> $submenus,'products' => $products,'catagories' => $catagories]); 
});




/**
 * !  product */
Route::get('/product/{id}', function ($id) {

    $products = DB::table('add__products')
            ->leftJoin('main__menus', 'add__products.id_main_menu', '=', 'main__menus.id')
            ->leftJoin('sub__menus', 'add__products.id_sub_menu', '=', 'sub__menus.id')
            ->where('add__products.id',$id)
            ->select('sub__menus.sub_menu','main__menus.main_menu','add__products.*')
            ->get();
    return view('product',['products' => $products]);
});

/**
 * ! ส่วนของ admin  */
Auth::routes();

//หน้า Home
Route::get('/register', [addAdminController::class, 'create'])->name('register');
Route::get('/admin', [addAdminController::class, 'index'])->name('admin');
Route::get('/admin-edit/{id}', [addAdminController::class, 'edit']);
Route::get('/admin-destroy/{id}', [addAdminController::class, 'destroy']);
Route::resource('/register2', addAdminController::class);

Route::get('/main-menu',[ Main_MenuController::class,'index']);
Route::post('/main-menu',[ Main_MenuController::class,'index'])->name('main-menu');
Route::get('/create-main-menu',[ Main_MenuController::class,'create']);
Route::post('/new-main_menu',[ Main_MenuController::class,'store']);
Route::get('/edit-main_menu/{id}',[ Main_MenuController::class,'edit']);
Route::put('/update-main_menu/{id}',[ Main_MenuController::class,'update']);
Route::get('/destroy-main_menu/{id}',[ Main_MenuController::class,'destroy']);
Route::put('/update-sort_manu/{id}',[ Main_MenuController::class,'sort_manu']);

Route::get('/sub-menu',[Sub_MenuController::class,'index']);
Route::post('/sub-menu',[Sub_MenuController::class,'index']);
Route::get('/create-sub-menu',[ Sub_MenuController::class,'create']);
Route::post('/new-sub_menu',[ Sub_MenuController::class,'store']);
Route::get('/edit-sub_menu/{id}',[ Sub_MenuController::class,'edit']);
Route::put('/update-sub_menu/{id}',[ Sub_MenuController::class,'update']);
Route::get('/destroy-sub_menu/{id}',[ Sub_MenuController::class,'destroy']);
Route::get('/home',[ AddProductController::class,'index']);
Route::post('/home',[ AddProductController::class,'index']);
Route::get('/create-peoduct',[ AddProductController::class,'create']);
Route::post('/get-sub_menu',[ AddProductController::class,'get_sub_menu']);
Route::post('/get-sub_menu_edit',[ AddProductController::class,'get_sub_menu_edit']);
Route::post('/add_product',[ AddProductController::class,'store']);
Route::get('/edit-product/{id}',[ AddProductController::class,'edit']);
Route::put('/update-product/{id}',[ AddProductController::class,'update']);
Route::get('/destroy-product/{id}',[ AddProductController::class,'destroy']);


Route::get('web-name',[ Web_NewController::class,'index']);
Route::get('create-website-name',[ Web_NewController::class,'create']);
Route::post('new-web-name',[ Web_NewController::class,'store']);
Route::get('edit-web-name/{id}',[ Web_NewController::class,'edit']);
Route::put('update-web-name/{id}',[ Web_NewController::class,'update']);

Route::get('/catagories',[ CatagoriesController::class,'index']);
Route::get('/create-catagories',[ CatagoriesController::class,'create']);
Route::post('/new-catagories',[ CatagoriesController::class,'store']);
Route::get('/edit-catagorie/{id}',[ CatagoriesController::class,'edit']);
Route::put('update-catagorie/{id}',[ CatagoriesController::class,'update']);
Route::get('destroy-catagorie/{id}',[ CatagoriesController::class,'destroy']);
Route::get('best-seller',[ Best_SellerController::class,'index']);
Route::get('create-best-seller',[ Best_SellerController::class,'create']);
Route::post('new-best-seller',[ Best_SellerController::class,'store']);
Route::get('edit-best-seller/{id}',[ Best_SellerController::class,'edit']);
Route::put('update-best-seller/{id}',[ Best_SellerController::class,'update']);
//ค้นหา
/* search_main_manu */
/* Route::post('/search_main_manu', [AddProductController::class, 'index']); */