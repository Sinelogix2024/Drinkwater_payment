<?php

namespace App\Http\Controllers\Advocate;

use Exception;
use Braintree\Gateway;
use Twilio\Rest\Client;
use App\Models\Advocate;
use App\Models\Order;
use App\Mail\OrderPlaced;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AdvocateController extends Controller
{
    /**
     * @name : getDetail
     */
    public function getDetail(Request $request)
    {
        try {
            $gateway = new Gateway([
                'environment' => env('BRAINTREE_ENV'),
                'merchantId' => env('BRAINTREE_MERCHANT_ID'),
                'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
                'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
                'acceptGzipEncoding' => false,
            ]);

            if ($request->method() == 'GET') {
                $clientToken = $gateway->clientToken()->generate();

                $data = Advocate::where([
                    ['adv_detail_access_token', $request->detail_access_token]
                ])->first();

                if ($data) {
                    return view('advocate/link', [
                        'advocateData' => $data,
                        'client_token' => $clientToken
                    ]);
                } else {
                    return view('others/no_data_found');
                }
            }

            if ($request->method() == 'POST') {
                // return $request->all();
                $amount = $request->total_amount ?? 10.00;
                $result = $gateway->transaction()->sale([
                    'amount' => $amount,
                    'paymentMethodNonce' => $request->payment_method_nonce,
                    'deviceData' => "deviceDataFromTheClient",
                    'options' => ['submitForSettlement' => True]
                ]);

                $orderId = Order::insertGetId([
                    'odr_id' => 'ordr_dw_' . time() . '_' . date('Y_m_d'),
                    'odr_first_name' => $request->first_name,
                    'odr_last_name' => $request->last_name,
                    'odr_email' => $request->email,
                    'odr_mobile' => str_replace("-", "", $request->mobile),
                    'odr_product_id' => $request->product,
                    'odr_package_id' => $request->package,
                    'odr_delivery_frequency_id' => $request->delivery_frequency,
                    'billing_address' => $request->shipping_address,
                    'shipping_address' => $request->billing_address,
                    'billing_address2' => $request->shipping_address2,
                    'shipping_address2' => $request->billing_address2,
                    'b_city_state_zip' => $request->b_city_state_zip,
                    's_city_state_zip' => $request->s_city_state_zip,
                    'payment_method' => (int) $request->payment_method_hidden,
                    'odr_transaction_id' => strtoupper($result->transaction->id),
                    'odr_transaction_amount' => $amount,
                    'odr_adv_detail_access_token' => $request->adv_detail_access_token,
                    'odr_tax_amount' => $request->tax_amount,
                ]);

                $orderDetail = Order::find($orderId);
                $advocateData = Advocate::where('adv_detail_access_token', $request->adv_detail_access_token)->first();

                Mail::to($request->email)->send(new OrderPlaced($advocateData, $orderDetail));

                try {
                    $body = "Congratulations " . $orderDetail->odr_first_name . " on confirming your path to hydration wellness ! We appreciate your interest in our products, and are here to support your goals. Please find your receipt here: " . url('orderDetail/' . $orderDetail->odr_id) . " Remember DRINK WATR™.. STAY STRONG®";

                    // $body = 'Hey ' . $orderDetail->odr_first_name . ' ' . $orderDetail->odr_last_name . '! Order Placed.' . 'Thanks For Shopping! Click on link to view Receipt.' . '<a href="' . url('orderDetail/' . $orderDetail->odr_id) . '"> TRACK </a>';

                    $accountSid = getenv("TWILIO_ACCOUNT_SID");
                    $authToken = getenv("TWILIO_AUTH_TOKEN");
                    $client = new Client($accountSid, $authToken);
                    $client->messages->create(
                        '+1' . str_replace("-", "", $request->mobile),
                        // getenv('TWILIO_TO_SEND_NUMBER'),
                        array(
                            'from' => getenv("TWILIO_NUMBER"),
                            'body' => $body
                        )
                    );
                } catch (Exception $e) {
                    Log::info('Twilio Error', [$e]);
                    // request()->session()->put('response_error_msg', $e->getMessage());
                }
                request()->session()->put('response_success_msg', 'You will receive a receipt via text and email.');
                return redirect(route('receipt', ['detail_access_token' => $request->detail_access_token, 'orderid' => $orderId]));
            }
        } catch (Exception $e) {
            Log::info('Server Error', [$e]);
            request()->session()->put('response_error_msg', $e->getMessage());
        }
        return redirect()->back();
    }

    public function getWatrDetail(Request $request)
    {
        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
            'acceptGzipEncoding' => false,
        ]);

        // return $request->method();
        if ($request->method() == 'GET' || $request->method() == 'PUT') {
            $detail_access_token = $request->detail_access_token;
            $clientToken = $gateway->clientToken()->generate();

            $data = Advocate::where([
                ['adv_detail_access_token', $request->detail_access_token]
            ])->first();

            $page = (int)$request->page;
            if ($request->method() == 'GET' && $page != 1) {
                return redirect(url('/watr', ['detail_access_token' => $detail_access_token, 'page' => 1]));
            }
            if ($data) {
                if ($request->method() == 'PUT' && $page == 2) {
                    return view('advocate/link2', [
                        'detail_access_token' => $detail_access_token,
                        'advocateData' => $data,
                        'client_token' => $clientToken
                        // 'client_token' => $clientToken
                    ]);
                }
                return view('advocate/page1', [
                    'detail_access_token' => $detail_access_token,
                    'advocateData' => $data,
                    'client_token' => $clientToken
                ]);
            } else {
                return view('others/no_data_found');
            }
        }

        if ($request->method() == 'POST') {

            $amount = $request->total_amount ?? 10.00;
            $result = $gateway->transaction()->sale([
                'amount' => $amount,
                'paymentMethodNonce' => $request->payment_method_nonce,
                'deviceData' => "deviceDataFromTheClient",
                'options' => ['submitForSettlement' => True]
            ]);

            // $result_venmo = $gateway->transaction()->sale([
            //     'amount' => $amount,
            //     'paymentMethodNonce' => $request->payment_method_nonce,
            //     'options' => [
            //         'submitForSettlement' => true,
            //         'venmo' => [
            //           'profileId' => '1953896702662410263'
            //         ]
            //     ],
            //     'deviceData' => "deviceDataFromTheClient",
            // ]);

            $orderId = Order::insertGetId([
                'odr_id' => 'ordr_dw_' . time() . '_' . date('Y_m_d'),
                'odr_first_name' => $request->first_name,
                'odr_last_name' => $request->last_name,
                'odr_email' => $request->email,
                'odr_mobile' => $request->mobile,
                'odr_package_id' => $request->package,
                'odr_delivery_frequency_id' => $request->delivery_frequency,
                'billing_address' => $request->billing_address,
                'shipping_address' => $request->shipping_address,
                'billing_address2' => $request->billing_address2,
                'shipping_address2' => $request->shipping_address2,
                'b_city_state_zip' => $request->b_city_state_zip,
                's_city_state_zip' => $request->s_city_state_zip,
                'payment_method' => (int) $request->payment_method_hidden,
                'odr_transaction_id' => $result->transaction->id,
                'odr_transaction_amount' => $amount,
                'odr_adv_detail_access_token' => $request->adv_detail_access_token,
                'odr_tax_amount' => $request->tax_amount,
            ]);

            // return
            $orderDetail = Order::find($orderId);
            $advocateData = Advocate::where('adv_detail_access_token', $request->adv_detail_access_token)->first();

            Mail::to($request->email)->send(new OrderPlaced($advocateData, $orderDetail));

            $accountSid = getenv("TWILIO_ACCOUNT_SID");
            $authToken = getenv("TWILIO_AUTH_TOKEN");
            $client = new Client($accountSid, $authToken);

            $body = "Congratulations " . $orderDetail->odr_first_name . " on confirming your path to hydration wellness ! We appreciate your interest in our products, and are here to support your goals. Please find your receipt here: " . url('orderDetail/' . $orderDetail->odr_id) . " Remember DRINK WATR™.. STAY STRONG®";

            // $body = 'Hey ' . $orderDetail->odr_first_name . ' ' . $orderDetail->odr_last_name . '! Order Placed.' .
            //     'Thanks For Shopping! Click on link to view Receipt.
            // ' . '<a href="' . url('orderDetail/' . $orderDetail->odr_id) . '"> TRACK </a>';

            try {
                $client->messages->create(
                    // '+91 '. $request->mobile,
                    getenv('TWILIO_TO_SEND_NUMBER'),
                    array(
                        'from' => getenv("TWILIO_NUMBER"),
                        'body' => $body
                    )
                );
            } catch (Exception $e) {
                dd("Error: " . $e->getMessage());
            }

            return redirect()->back();
        }
    }

    public function orderDetail(Request $request)
    {
        $orderDetail = Order::where('odr_id', $request->order_id)->first();

        $advocateData = Advocate::where('adv_detail_access_token', $orderDetail->odr_adv_detail_access_token)->first();

        return view('emails.order_placed_new', [
            'advocateData' => $advocateData,
            'orderDetail' => $orderDetail
        ]);
    }

    public function getAddress(Request $request)
    {
        try {
            $searchTxt = $request->search_text;
            if (empty($searchTxt)) {
                return [];
            }
            $addressDetails = Order::DISTINCT()->select('billing_address', 'billing_address2', 'b_city_state_zip', 'shipping_address', 'shipping_address2', 's_city_state_zip')
                ->where('billing_address', 'like', '%' . $searchTxt . '%')
                ->where('billing_address2', 'like', '%' . $searchTxt . '%')
                ->where('b_city_state_zip', 'like', '%' . $searchTxt . '%')
                ->where('shipping_address', 'like', '%' . $searchTxt . '%')
                ->where('shipping_address2', 'like', '%' . $searchTxt . '%')
                ->where('s_city_state_zip', 'like', '%' . $searchTxt . '%')
                ->get();

            return $addressDetails;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getCustomPayment(Request $request)
    {
        $invoiceDataObj = Invoice::where('odr_id', $request->paymentID)->first();
        if (empty($invoiceDataObj)) {
            abort(404, "Invoice Data Not Found");
        }
        // return $invoiceDataObj;
        if ($request->method() == 'GET') {
            $products = null;

            $allProducts = json_decode($invoiceDataObj->odr_product, true);
            foreach ($allProducts as $key => $value) {
                $products[] = json_decode($value);
            }
            $data = [$products];
            // return $data;
            return view('advocate.payment-review', compact('invoiceDataObj', 'products'));
        } else if ($request->method() == 'POST') {
            return view('advocate.custom-payment', compact('invoiceDataObj'));
        } else if ($request->method() == 'PUT') {
            $gateway = new Gateway([
                'environment' => env('BRAINTREE_ENV'),
                'merchantId' => env('BRAINTREE_MERCHANT_ID'),
                'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
                'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
                'acceptGzipEncoding' => false,
            ]);

            $paymentNonce = $request->payment_method_nonce;
            $invoiceID = $request->invoice_id;
            $orderID = $request->odr_id;
            $amount = $request->odr_total_amount ?? 10.00;

            $result = $gateway->transaction()->sale([
                'amount' => $amount,
                'paymentMethodNonce' => $paymentNonce,
                'deviceData' => "deviceDataFromTheClient",
                'options' => ['submitForSettlement' => True]
            ]);

            $invoiceObj = null;
            if ($result->success) {
                $invoiceObj = Invoice::find($invoiceID);
                $invoiceObj->payment_method = $request->payment_method;
                $invoiceObj->odr_transaction_id = strtoupper($result->transaction->id);
                $invoiceObj->odr_payment_status = $result->transaction->status;
                $invoiceObj->save();

                // Mail::to($invoiceObj->odr_email)->send(new OrderPlaced($advocateData, $orderDetail));

                // try {
                //     $body = "Congratulations " . $orderDetail->odr_first_name . " on confirming your path to hydration wellness ! We appreciate your interest in our products, and are here to support your goals. Please find your receipt here: " . url('orderDetail/' . $orderDetail->odr_id) . " Remember DRINK WATR™.. STAY STRONG®";

                //     // $body = 'Hey ' . $orderDetail->odr_first_name . ' ' . $orderDetail->odr_last_name . '! Order Placed.' . 'Thanks For Shopping! Click on link to view Receipt.' . '<a href="' . url('orderDetail/' . $orderDetail->odr_id) . '"> TRACK </a>';

                //     $accountSid = getenv("TWILIO_ACCOUNT_SID");
                //     $authToken = getenv("TWILIO_AUTH_TOKEN");
                //     $client = new Client($accountSid, $authToken);
                //     $client->messages->create(
                //         '+1' . str_replace("-", "", $request->mobile),
                //         // getenv('TWILIO_TO_SEND_NUMBER'),
                //         array(
                //             'from' => getenv("TWILIO_NUMBER"),
                //             'body' => $body
                //         )
                //     );
                // } catch (Exception $e) {
                //     Log::info('Twilio Error', [$e]);
                //     // request()->session()->put('response_error_msg', $e->getMessage());
                // }
                // request()->session()->put('response_success_msg', 'You will receive a receipt via text and email.');
                // return redirect(route('receipt', ['detail_access_token' => $request->detail_access_token, 'orderid' => $orderId]));
            }

            return [$invoiceObj, $result, $request->all()];
        }
    }

    public function addInvoiceUser(Request $request)
    {
        try {
            $invoiceObj = Invoice::insert(
                [
                    'odr_id' => $request->odr_id,
                    'odr_contact_name' => $request->odr_contact_name,
                    'odr_company_name' => $request->odr_company_name,
                    'odr_email' => $request->odr_email,
                    'odr_mobile' => str_replace('-', '', $request->odr_mobile),
                    'odr_product' => $request->odr_product,
                    'billing_address' => $request->billing_address,
                    'billing_address2' => $request->billing_address2,
                    'b_city_state_zip' => $request->b_city_state_zip,
                    'payment_method' => $request->payment_method,
                    'odr_transaction_id' => $request->odr_transaction_id,
                    'delivery_fee' => $request->delivery_fee,
                    'odr_total_amount' => $request->odr_total_amount,
                    'odr_tax_amount' => $request->odr_tax_amount
                ]
            );
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}