<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\GoogleController;


Route::get('/', function () {
    return redirect(route('login'));
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get('/list_profile', "App\Http\Controllers\ProfileController@index")->name('list_profile');
// Route::get('/update_profile_status', "App\Http\Controllers\ProfileController@update_profile_status")->name('update_profile_status');
// Route::get('/add_profile', "App\Http\Controllers\ProfileController@create");
// Route::post('/add_profile', "App\Http\Controllers\ProfileController@insert");
// Route::get('/edit_profile/{id}', "App\Http\Controllers\ProfileController@show");
// Route::post('/edit_profile', "App\Http\Controllers\ProfileController@update");
// Route::get('/getProfile/{id}', "App\Http\Controllers\ProfileController@getProfile")->name('getProfile');

// Route::Post('/delete_profile', "App\Http\Controllers\ProfileController@delete")->name('delete_profile');
// Route::get('/logout', "App\Http\Controllers\LoginController@logout")->name('logout');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/list_profile', "App\Http\Controllers\ProfileController@index")->name('list_profile');
    Route::get('/update_profile_status', "App\Http\Controllers\ProfileController@update_profile_status")->name('update_profile_status');
    Route::get('/add_profile', "App\Http\Controllers\ProfileController@create");
    Route::post('/add_profile', "App\Http\Controllers\ProfileController@insert");
    Route::get('/edit_profile/{id}', "App\Http\Controllers\ProfileController@show");
    Route::post('/edit_profile', "App\Http\Controllers\ProfileController@update");
    Route::get('/getProfile/{id}', "App\Http\Controllers\ProfileController@getProfile")->name('getProfile');

    Route::Post('/delete_profile', "App\Http\Controllers\ProfileController@delete")->name('delete_profile');
    Route::get('/logout', "App\Http\Controllers\LoginController@logout")->name('logout');
});


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


Route::get('/getState/{id}','App\Http\Controllers\ProfileController@getState');
Route::get('/getCity/{id}','App\Http\Controllers\ProfileController@getCity');
