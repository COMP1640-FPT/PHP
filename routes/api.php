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
Route::prefix('handleRequest')->group(function () {
    Route::get('user/{role}', 'UserController@handleRoleChange')->name('handle.roleChange');
    Route::get('tutors', 'UserController@getTutors')->name('handle.getTutors');
});
Route::resource('user', 'UserController', ['except' => ['show', 'create']]);
Route::name('ping')->get('ping', function() {
    return response()->json([
        'results' => null,
        'success' => true,
        'message' => 'Ping!',
    ]);
});


Route::resource('major', 'MajorController', ['except' => ['create','edit']]);
