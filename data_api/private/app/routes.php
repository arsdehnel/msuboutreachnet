<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

header('Access-Control-Allow-Origin: *');  
header('Access-Control-Allow-Headers: X-Requested-With, X-HTTP-Method-Override, Content-Type');
header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS');
header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' );
header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
header( 'Cache-Control: no-store, no-cache, must-revalidate' );
header( 'Cache-Control: post-check=0, pre-check=0', false );
header( 'Pragma: no-cache' ); 

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/authtest', array('before' => 'auth.basic', function()
{
    return View::make('hello');
}));

//Route::group(array('prefix' => 'api/v1', 'before' => 'auth.basic'), function()
Route::group(array('prefix' => 'api/v1'), function()
{
	//handle **ALL** the options method calls 
	//because the allow methods header will make sure it's one of the one we're okay with
	Route::options('{controller}/{method}/{id?}',function(){
		return 'OK';
	});
	
	
	
	/* -------------------------------------------------------------
	   MENU
	   ------------------------------------------------------------- */
	//handle the "save" all in one
	Route::match(array('POST','PUT'),'menu/item/{id?}','MenuController@saveItem');

	//retrieving a resultset of items
	Route::match(array('GET','POST'),'menu/items','MenuController@getItems');
	
	//retrieve a single item
	Route::get('menu/item/{id?}','MenuController@getItem');
	
	//remove an item
	Route::delete('menu/item/{id}','MenuController@removeItem');
	
});