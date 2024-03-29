<?php
use App\Http\Controllers\Advocate\AdvocateController;
use App\Mail\OrderPlaced;
use App\Models\Order;
use App\Models\Advocate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Twilio\Rest\Client;


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

Route::get('/welcome', function () {
    return view('drinkWaterWelcome');
})->name('welcome');

Route::get('/link', function () {
    return view('advocate/link');
})->name('link');

Route::get('/us-token', 'App\Http\Controllers\Advocate\AdvocateController@usToken')->name('us-token');

Route::get('/invoice-us-bank-payment-processing', 'App\Http\Controllers\Advocate\AdvocateController@invoiceUsBankPaymentProcessing')->name('invoice-us-bank-payment-processing');
Route::post('/ajax-submit-for-settlement', 'App\Http\Controllers\Advocate\AdvocateController@usSubmitForSettlement');

Route::get('/', function () {
    // dd(env('APP_DEBUG')); 
    return view('advocate/experience');
});

Route::get('/discover/{detail_access_token}', function ($detail_access_token) {
    return view('advocate/discover')->with('detail_access_token', $detail_access_token);
});

Route::get('/home/{detail_access_token}', [AdvocateController::class, 'GetHomePage']);
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

Route::match(['get'], '/watr/receipt/{detail_access_token}/receipt/{orderid}', function ($detail_access_token, $orderid) {
    return view('advocate.receipt')->with($detail_access_token, $orderid);
})->name('receipt');

Route::match(['get'], '/orderDetail/{order_id}', 'App\Http\Controllers\Advocate\AdvocateController@orderDetail');


// Route::match(['post'], '/invoice', 'App\Http\Controllers\Advocate\AdvocateController@getInvoicePayment');
Route::match(['get'], '/invoice-payment/{paymentID}', 'App\Http\Controllers\Advocate\AdvocateController@getCustomPayment');
Route::match(['post'], '/invoice-payment/{paymentID}', 'App\Http\Controllers\Advocate\AdvocateController@getCustomPayment');
Route::match(['put'], '/invoice-payment/{paymentID}', 'App\Http\Controllers\Advocate\AdvocateController@getCustomPayment');

// venom payment gateway response
Route::match(['get'], '/venmo_server/{payerID}/{deviceData}/{amount}', 'App\Http\Controllers\BrainTreeController@venomResponse');

Route::get('email', function () {
    // dd(request()->mno);
    // $accountSid = getenv("TWILIO_ACCOUNT_SID");
    // $authToken = getenv("TWILIO_AUTH_TOKEN");
    // $client = new Client($accountSid, $authToken);
    // $body = 'Hey ! Order Placed.';
    // try {
    //     $client->messages->create(
    //         '+' . request()->mno,
    //         array(
    //             'from' => getenv("TWILIO_NUMBER"),
    //             'body' => $body
    //         )
    //     );

    //     return "msg sent";
    //     // request()->session()->put('response_success_msg', 'You will receive a receipt via text and email.');
    //     // return redirect(route('receipt', ['detail_access_token' => $request->detail_access_token, 'orderid' => $orderId]));
    // } catch (Exception $e) {
    //     // request()->session()->put('response_error_msg', $e->getMessage());
    //     return $e->getMessage();
    // }

    $orderDetail = Order::find(28);
    dd($orderDetail);
    $advocateData = Advocate::where('adv_detail_access_token', 'kny12raph')->first();
    // Mail::to($request->email)->send(new OrderPlaced($advocateData, $orderDetail));
    // Mail::to('jaydeep.khokhar+testemail@techqware.com')->send(new OrderPlaced($advocateData, $orderDetail));
    // return ['advocateData' => $advocateData, 'orderDetail' => $orderDetail];
    return view('emails.order_placed_new', ['advocateData' => $advocateData, 'orderDetail' => $orderDetail]);
});

