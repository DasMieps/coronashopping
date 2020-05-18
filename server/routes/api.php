<?php

use Illuminate\Http\Request;
use App\Shoppinglist;

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

Route::get('shoppinglists', 'ShoppinglistController@index');
Route::get('shoppinglist/{id}', 'ShoppinglistController@findById');
Route::get('shoppinglists/checkid/{id}', 'ShoppinglistController@checkId');
Route::get('shoppinglists/search/{searchTerm}', 'ShoppinglistController@findBySearchTerm');
Route::post('shoppinglist', 'ShoppinglistController@save');
Route::put('shoppinglist/{id}','ShoppinglistController@update');
Route::delete('shoppinglist/{id}','ShoppinglistController@delete');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group (['middleware' => ['api', 'cors']], function () {
    Route:: post('auth/register', 'Auth\ApiRegisterController@create');
    Route::post('auth/login', 'Auth\ApiAuthController@login');
});

Route::group (['middleware' => [ 'api', 'cors', 'jwt.auth']], function (){
    Route::post ('shoppinglist', 'ShoppinglistController@save');
    Route::post ('auth/logout', 'Auth\ApiAuthController@logout');
    Route::delete ('shoppinglist/{id}', 'ShoppinglistController@delete');
});