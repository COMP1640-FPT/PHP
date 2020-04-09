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
    Route::get('logout', 'AuthController@logout');
    Route::get('me', 'AuthController@me');
    Route::prefix('handleRequest')->group(function () {
        Route::get('code/{role}', 'UserController@getCodeByRole')->name('handle.get.code.by.role');
        Route::get('users/{role}', 'UserController@getUsersByRole')->name('handle.get.users.by.role');
    });
    Route::resource('user', 'UserController', ['except' => ['show', 'create']]);
    Route::get('change_status/{id}', 'UserController@changeStatusOfUser')->name('change.status.of.user');
    Route::get('user/{code}', 'UserController@getUserByCode')->name('get.user.by.code');
    Route::post('assign', 'LearningController@assignStudentsForTutor')->name('assign.students.for.tutor');
});

