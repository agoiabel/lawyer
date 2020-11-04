<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('auth/store', ['as' => 'auth.store', 'uses' => 'AuthController@store']);
Route::post('signup/store', ['as' => 'signup.store', 'uses' => 'SignupController@store']);

Route::post('email_confirm/store', ['as' => 'email_confirm.store', 'uses' => 'ConfirmEmailController@store']);
Route::post('password_reset/store', ['as' => 'password_reset.store', 'uses' => 'PasswordResetController@store']);
Route::post('password_reset/update', ['as' => 'password_reset.update', 'uses' => 'PasswordResetController@update']);

Route::group(['middleware' => ['Api.auth']], function () {

	Route::prefix('profile')->group(function () {
		// Route::get('index', ['as' => 'profile.index', 'uses' => 'ProfileController@index']);
		// Route::post('store', ['as' => 'profile.store', 'uses' => 'ProfileController@store']);
	});

});