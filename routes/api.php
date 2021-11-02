<?php

use Illuminate\Http\Request;
use App\Item;
use App\Http\Resources\Item as ItemResource;
use App\Http\Resources\ItemCollection;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/search', function (Request $request) {
    $keyword = $request->input('keyword');

    $explode_keyword = explode(' ', $keyword);

    $array = array();
    foreach ($explode_keyword as $keyword) {
        $array[] = array('description', 'like', "%$keyword%");
    }

    $query = Item::where($array)->get();

    // dd($query->toSql());

    return new ItemCollection($query);
});