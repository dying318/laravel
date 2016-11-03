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
/**
* 
*/
Class Foo {

}

App::bind('foo', function () {
	return new stdClass();
});
dd(app());

Route::get('/user', function (Foo $request) {
	dd($request);
    return $request->user();
});

// Route::get('/user', function (Request $request) {
// 	App::make('routes');
//     $hash = app('hash');
//     // dump(app());
// 	dd($hash);
//     return $request->user();
// });
