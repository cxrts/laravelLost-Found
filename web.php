<?php

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
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/getAll', function() {
    header("Access-Control-Allow-Origin: *");
     return $db = App\Item::all();
});

Route::get('/getFounds', function() {
    header("Access-Control-Allow-Origin: *");
    return $founds = App\Item::where('status',1)->get();
});

Route::get('/getLosts', function() {
    header("Access-Control-Allow-Origin: *");
    return $losts = App\Item::where('status',0)->get();
});

Route::get('/search', function(Request $req) {
    header("Access-Control-Allow-Origin: *");
    return $items = DB::table('items')
                    ->where('title', 'like', "%".$req->test."%")
                    ->orWhere('description', 'like', "%".$req->test."%")
                    ->get();
});