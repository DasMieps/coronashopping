<?php

use App\User;

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

/*Route::get ('/', function () {
    $users = DB::table ('users')->get();
    return view( 'welcome', compact ('users'));
});

Route::get ('/users', function () {
    $users = User::all ();
    return view('users.index', compact ( 'users' ));
});

Route::get ('/users/{id}', function ($id) {
//dd($isbn); //die and dump -> Hilfsfunktion von Laravel
    $user = User::find($id);
//dd($user);
    return view('users.show', compact ('user'));
}); */

Route::get ( '/', 'ShoppinglistController@index' );
Route::get ( '/Shoppinglists', 'ShoppinglistBookController@index' );
Route::get ( '/Shoppinglists/{Shoppinglist}', 'ShoppinglistController@show' );