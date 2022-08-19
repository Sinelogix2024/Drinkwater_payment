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

// Route::get('/', function () {
//     // dd('test');

//     // return view('pdf');


//     $orderDetail = Order::find(1);

//     // return
//     $advocateData = Advocate::where('adv_detail_access_token', '7p4MQhdEhl92jG9ZwpOOQBTJayd7qz1HonEjJKt0kFZ9hiCWqJ')->first();


//     // return $advocateData;
//     // return $orderDetail;

//     $pdf = PDF::loadView('emails.order_placed_new',[
//         'advocateData' => $advocateData,
//         'orderDetail' => $orderDetail,
//     ]);

//     // $pdf = PDF::loadView('pdf');
//     // $pdf = PDF::loadView('emails.test');

//     $path = public_path('pdf_docs/');
//     $fileName =  time().'.'. 'pdf' ;
//     $pdf->save($path . '/' . $fileName);

//     $generated_pdf_link = url('pdf_docs/'.$fileName);

//     return response()->json($generated_pdf_link);

//     return $pdf->download('pdfview.pdf');

//     return view('emails.order_placed_new');
// })->name('splash');

// Route::get('/welcome', function () {
//     return view('drinkWaterWelcome');
// })->name('welcome');


// Route::get('/link', function () {
//     return view('advocate/link');
// })->name('link');
Route::get('/', function () {
    return view('advocate/experience');
});

Route::get('/discover/{detail_access_token}', function ($detail_access_token) {
    return view('advocate/discover')->with('detail_access_token', $detail_access_token);
});

Route::get('/home/{detail_access_token}', function ($detail_access_token) {
    return view('advocate/experience')->with('detail_access_token', $detail_access_token);
});
Route::get('/experience/{detail_access_token}', function ($detail_access_token) {
    return view('advocate/drink')->with('detail_access_token', $detail_access_token);
})->name('experience');

Route::get('/search-address', 'App\Http\Controllers\Advocate\AdvocateController@getAddress');

Route::get('/privacy', function () {
    return view('advocate.privacy');
});

Route::get('/legal', function () {
    return view('advocate.legal');
});

Route::match(['get'], '/braintree', 'App\Http\Controllers\BrainTreeController@view');
Route::match(['post'], '/braintree', 'App\Http\Controllers\BrainTreeController@call');
// Route::match(['get'], '/watr/{detail_access_token}', 'App\Http\Controllers\Advocate\AdvocateController@getDetail');
// Route::match(['post'], '/watr/{detail_access_token}', 'App\Http\Controllers\Advocate\AdvocateController@getDetail');

Route::match(['get'], '/watr/{detail_access_token}/{page?}', 'App\Http\Controllers\Advocate\AdvocateController@getwatrDetail');
Route::match(['put'], '/watr/{detail_access_token}/{page}', 'App\Http\Controllers\Advocate\AdvocateController@getwatrDetail');
Route::match(['post'], '/watr/{detail_access_token}/{page?}', 'App\Http\Controllers\Advocate\AdvocateController@getDetail');

Route::match(['get'], '/watr/receipt/{detail_access_token}/receipt/{orderid}', function () {
    return view('advocate.receipt');
})->name('receipt');
Route::match(['get'], '/orderDetail/{order_id}', 'App\Http\Controllers\Advocate\AdvocateController@orderDetail');

// venom payment gateway response
Route::match(['get'], '/venmo_server/{payerID}/{deviceData}/{amount}', 'App\Http\Controllers\BrainTreeController@venomResponse');

Route::get('email', function () {
    return view('emails.order_placed_new');
});