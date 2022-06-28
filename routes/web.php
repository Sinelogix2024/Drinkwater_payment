<?php

use App\Models\Order;
use App\Models\Advocate;
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
    // dd('test');

    $orderDetail = Order::find(1);

    // return 
    $advocateData = Advocate::where('adv_detail_access_token', '7p4MQhdEhl92jG9ZwpOOQBTJayd7qz1HonEjJKt0kFZ9hiCWqJ')->first();


    return $pdf = PDF::loadView('emails.order_placed_new',[
        'advocateData' => $advocateData,
        'orderDetail' => $orderDetail,
    ]);

    return $pdf->download('pdfview.pdf');
    
    return view('emails.order_placed_new');
})->name('splash');

// Route::get('/welcome', function () {
//     return view('drinkWaterWelcome');
// })->name('welcome');


// Route::get('/link', function () {
//     return view('advocate/link');
// })->name('link');

Route::match(['get'],'/braintree', 'App\Http\Controllers\BrainTreeController@view');
Route::match(['post'],'/braintree', 'App\Http\Controllers\BrainTreeController@call');
Route::match(['get'],'/wateradvocate/{detail_access_token}', 'App\Http\Controllers\Advocate\AdvocateController@getDetail');
Route::match(['post'],'/wateradvocate/{detail_access_token}', 'App\Http\Controllers\Advocate\AdvocateController@getDetail');

Route::match(['get'],'/orderDetail', 'App\Http\Controllers\Advocate\AdvocateController@orderDetail');
