<?php

use Illuminate\Http\Request;

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
Route::post('/postitems',['uses'=>'ItemController@postitem']);
Route::get('/getitems',['uses'=>'ItemController@getitem']);


Route::get('/aboutus',['uses'=>'AboutusController@index']);

Route::get('about/{id}',['uses'=>'AboutusController@show']);

Route::post('/addabout',[
    'uses'=>'AboutusController@store',
]);

Route::post('/updateabout/{id}',['uses'=>'AboutusController@update']);

Route::delete('/deleteabout/{id}',[
    'uses'=>'AboutusController@destroy',
]);

Route::patch('about/{id}',[
    'uses'=>'AboutusController@edit',
]);