<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\addAdminController;
use App\Http\Controllers\Main_MenuController;
use App\Http\Controllers\Sub_MenuController;
use App\Http\Controllers\AddProductController;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
        ->get();
    return view('welcome',['products' => $products]);
});
Route::get('/shop', function () {
    $menus = DB::table('main__menus')
        ->get();
    $submenus = DB::table('sub__menus')
        ->get();
    $products = DB::table('add__products')
        ->paginate(100);

    return view('shop',['menus' => $menus,'submenus'=> $submenus,'products' => $products]);
});

Route::get('/search/{name}', function ($name) {

    $menus = DB::table('main__menus')
        ->get();
    $submenus = DB::table('sub__menus')
        ->get();

    $products = DB::table('add__products')->leftJoin('main__menus', 'add__products.id_main_menu', '=', 'main__menus.id')
            ->select('main__menus.id','main__menus.main_menu','add__products.*')
            ->leftJoin('sub__menus', 'add__products.id_sub_menu', '=', 'sub__menus.id')
            ->orWhere('sub_menu', 'like', "$name%")
            ->orWhere('main_menu', 'like', "$name%")
            ->select('sub__menus.sub_menu','main__menus.main_menu','add__products.*')
            ->get();
    return view('shop',['menus' => $menus,'submenus'=> $submenus,'products' => $products]); 
});

Route::post('/search', function (Request $request) {
    $search =  $request->search;
    if ($search === "date") {
        $search = Carbon::now()->format('m');
    }

    $menus = DB::table('main__menus')
        ->get();
    $submenus = DB::table('sub__menus')
        ->get();

    $products = DB::table('add__products')->leftJoin('main__menus', 'add__products.id_main_menu', '=', 'main__menus.id')
            ->select('main__menus.id','main__menus.main_menu','add__products.*')
            ->leftJoin('sub__menus', 'add__products.id_sub_menu', '=', 'sub__menus.id')
            ->whereMonth('add__products.created_at', "$search")
            ->orWhere('main_menu', 'like', "$search%")
            ->orWhere('sub_menu', 'like', "$search%")
            ->orWhere('product_name', 'like', "$search%")
            ->orWhere('price', 'like', "$search%")
            ->orWhere('price_discount', 'like', "$search%")
            ->orWhere('status_product', 'like', "$search%")
            ->select('sub__menus.sub_menu','main__menus.main_menu','add__products.*')
            ->get();
    return view('shop',['menus' => $menus,'submenus'=> $submenus,'products' => $products]); 
});



Route::get('/product', function () {
    return view('product');
});

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
//ค้นหา
/* search_main_manu */
/* Route::post('/search_main_manu', [AddProductController::class, 'index']); */