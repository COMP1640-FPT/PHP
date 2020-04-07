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

Route::name('ping')->get('ping', function() {
    return response()->json([
        'results' => null,
        'success' => true,
        'message' => 'Ping!',
    ]);
});
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('me', 'AuthController@me');
    Route::prefix('handleRequest')->group(function () {
        Route::get('user/{role}', 'UserController@handleRoleChange')->name('handle.roleChange');
        Route::get('tutors', 'UserController@getTutors')->name('handle.getTutors');
    });
    Route::resource('user', 'UserController', ['except' => ['show', 'create']]);
});

