<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\addAdminController;
use App\Http\Controllers\Main_MenuController;
use App\Http\Controllers\Sub_MenuController;
use Illuminate\Support\Facades\DB;
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
    return view('welcome');
});
Route::get('/shop', function () {
    $menus = DB::table('main__menus')
  /*   ->paginate(10); */
/*   ->orderBy('main__menus.main_menu', 'ASC') */
  ->get();
  $submenus = DB::table('sub__menus')
  /*   ->paginate(10); */
  /* ->orderBy('sub__menus.sub_menu', 'ASC') */
  ->get();

    return view('shop',['menus' => $menus,'submenus'=> $submenus]);
});
Route::get('/product', function () {
    return view('product');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/register', [addAdminController::class, 'create'])->name('register');
Route::get('/admin', [addAdminController::class, 'index'])->name('admin');
Route::get('/admin-edit/{id}', [addAdminController::class, 'edit']);
Route::get('/admin-destroy/{id}', [addAdminController::class, 'destroy']);
Route::resource('/register2', addAdminController::class);
Route::get('/main-menu',[ Main_MenuController::class,'index']);
Route::get('/create-main-menu',[ Main_MenuController::class,'create']);
Route::post('/new-main_menu',[ Main_MenuController::class,'store']);
Route::get('/edit-main_menu/{id}',[ Main_MenuController::class,'edit']);
Route::put('/update-main_menu/{id}',[ Main_MenuController::class,'update']);
Route::get('/destroy-main_menu/{id}',[ Main_MenuController::class,'destroy']);
Route::get('/sub-menu',[Sub_MenuController::class,'index']);
Route::get('/create-sub-menu',[ Sub_MenuController::class,'create']);
Route::post('/new-sub_menu',[ Sub_MenuController::class,'store']);
Route::get('/edit-sub_menu/{id}',[ Sub_MenuController::class,'edit']);
Route::put('/update-sub_menu/{id}',[ Sub_MenuController::class,'update']);
Route::get('/destroy-sub_menu/{id}',[ Sub_MenuController::class,'destroy']);