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

Route::get('/', function () {
    return view('splash');
})->name('splash');

Route::get('/welcome', function () {
    return view('drinkWaterWelcome');
})->name('welcome');


Route::get('/link', function () {
    return view('advocate/link');
})->name('link');

Route::match(['get','post'],'/wateradvocate/{detail_access_token}', 'App\Http\Controllers\Advocate\AdvocateController@getDetail');