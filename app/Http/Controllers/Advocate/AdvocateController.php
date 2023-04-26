<?php

namespace App\Http\Controllers\Advocate;

use Exception;
use Braintree\Gateway;
use Twilio\Rest\Client;
use App\Models\Advocate;
use App\Models\Order;
use App\Models\AchCustomer;
use App\Models\InvoiceAchCustomer;
use App\Mail\OrderPlaced;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Braintree\Result\UsBankAccountVerification;
use Carbon\Carbon;

class AdvocateController extends Controller
{
    public function usToken()
    {

        return view('advocate.us-bank-account-token');
    }

    public function invoiceUsBankPaymentProcessing()
    {
       $data = Invoice::where('payment_method',5)->whereNull('odr_transaction_id')->with('lastOrder')->get();
       return view('advocate.us-bank-payment-process',compact('data'));
    }

    public function usSubmitForSettlement(Request $request)
    {
        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
            'acceptGzipEncoding' => false,
        ]);

           $result = $gateway->paymentMethod()->create([
        'customerId' => $request->customer_id,
        'paymentMethodNonce' => $request->payment_method_nonce,
        'options' => [
            'usBankAccountVerificationMethod' => UsBankAccountVerification::INDEPENDENT_CHECK
        ]
      ]);
     // \Log::info($result);
      if ($result->success) {

        $vid =  $result->paymentMethod->token;
         $usBankAccount = $result->paymentMethod;

         $verified = $usBankAccount->verified;
         $responseCode = $usBankAccount->verifications[0]->processorResponseCode;
         //print_r($usBankAccount->verifications[0]->processorResponseCode);

       }

      $result = $gateway->transaction()->sale([
        'amount' => $request->total_amount,
        'paymentMethodToken' => $vid,
        'deviceData' => "deviceDataFromTheClient",
        'options' => [
          'submitForSettlement' => True
        ]
      ]);

            $invoiceObj = null;
            if ($result->success) {
                $invoiceObj = Invoice::find($request->id);
                $invoiceObj->payment_method = $request->payment_method;
                $invoiceObj->odr_transaction_id = strtoupper($result->transaction->id);
                // $invoiceObj->odr_payment_status = $result->transaction->status;
                $invoiceObj->odr_payment_status = 'Settlement Pending';
                $invoiceObj->save();

                $products = null;

                $allProducts = json_decode($invoiceObj->odr_product, true);
                foreach ($allProducts as $key => $value) {
                $products[] = json_decode($value);
                }
                Mail::to($invoiceObj->odr_email)->send(new OrderPlaced($invoiceObj, $products, true));

                try {
                    $body = "Congratulations " . $invoiceObj->odr_contact_name . " on confirming your path to hydration wellness ! We appreciate your interest in our products, and are here to support your goals. Remember DRINK WATR™.. STAY STRONG®";

                    $accountSid = getenv("TWILIO_ACCOUNT_SID");
                    $authToken = getenv("TWILIO_AUTH_TOKEN");
                    $client = new Client($accountSid, $authToken);
                    $client->messages->create(
                        '+1' . str_replace("-", "", $request->mobile),
                        array(
                            'from' => getenv("TWILIO_NUMBER"),
                            'body' => $body
                        )
                    );
                } catch (Exception $e) {
                    Log::info('Twilio Error', [$e]);
                    // request()->session()->put('response_error_msg', $e->getMessage());
                }


                return $result->transaction->id;

            } else{
                return false;
            }






    }

    public function GetHomePage(Request $request)
    {
        $detail_access_token = $request->detail_access_token;

        $accessTokenData = Advocate::where('adv_detail_access_token', $detail_access_token)->first();

        if (empty($accessTokenData)) {
            return view('others/no_data_found');
        }

        if ($accessTokenData->is_collab == 1) {
            return view('advocate/experience')->with('detail_access_token', $detail_access_token);
        }
        return redirect(route('experience', ['detail_access_token' => $detail_access_token]));
    }
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
                $amount = $request->total_amount ?? 10.00;
                 if($request->payment_method == 5)
                 {
                    $nonceFromTheClient = $request->payment_method_nonce;
                    $ach_customer = AchCustomer::where('email',$request->email)->first();
                    if($ach_customer)
                    {
                        $cus_id = $ach_customer->customer_id;
                        $ach_user_id = $ach_customer->id;
                    }else{
                        //Create Customer
                        $result = $gateway->customer()->create([
                            'firstName' => $request->first_name,
                            'lastName' => $request->last_name,
                            'email' => $request->email,
                            'phone' => $request->mobile
                            //'company' => $_POST['business-name'],
                            //'paymentMethodNonce' => $nonceFromTheClient
                          ]);

                          if ($result->success) {
                            $cus_id = $result->customer->id;

                          $ach_user_id =  AchCustomer::insertGetId(['first_name'=>$request->first_name,
                                'last_name'=>$request->last_name,
                                'email'=>$request->email,
                                'phone'=> $request->mobile,
                                'customer_id'=>$cus_id,
                                'account_number'=> $request->account_number,
                                'routing_number'=>$request->routing_number,
                                'account_type'=>$request->account_type,
                                'ownership_type'=>$request->ownership_type]);


                          }
                        //   else {
                        //     foreach($result->errors->deepAll() AS $error) {
                        //         echo($error->code . ": " . $error->message . "\n");
                        //     }
                        //   }
                          // End Create Customer
                    }


                      $result = $gateway->paymentMethod()->create([
                        'customerId' => $cus_id,
                        'paymentMethodNonce' => $nonceFromTheClient,
                        'options' => [
                            'usBankAccountVerificationMethod' => UsBankAccountVerification::INDEPENDENT_CHECK
                        ]
                      ]);

                      if ($result->success) {

                        $vid =  $result->paymentMethod->token;
                         $usBankAccount = $result->paymentMethod;

                         $verified = $usBankAccount->verified;
                         $responseCode = $usBankAccount->verifications[0]->processorResponseCode;
                         //print_r($usBankAccount->verifications[0]->processorResponseCode);

                       }

                      $result = $gateway->transaction()->sale([
                        'amount' => $amount,
                        'paymentMethodToken' => $vid,
                        'deviceData' => "deviceDataFromTheClient",
                        'options' => [
                          'submitForSettlement' => True
                        ]
                      ]);


                 }
                 else{

                $result = $gateway->transaction()->sale([
                    'amount' => $amount,
                    'paymentMethodNonce' => $request->payment_method_nonce,
                    'deviceData' => "deviceDataFromTheClient",
                    'options' => ['submitForSettlement' => True]
                ]);
            }
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
                if($request->payment_method == 5)
                {
                    AchCustomer::where('id',$ach_user_id)->update(['last_order_id'=>$orderId,'next_order_date'=>Carbon::now()->addMonth(),'is_subscribed'=>'1']);
                }
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
        $products = null;

        $allProducts = json_decode($invoiceDataObj->odr_product, true);
        foreach ($allProducts as $key => $value) {
            $products[] = json_decode($value);
        }

        $invoiceStatus = null;
        if (!empty($invoiceDataObj->odr_transaction_id) && ($invoiceDataObj->odr_payment_status == 'success' || $invoiceDataObj->odr_payment_status == 'Settlement Pending')) {
            $invoiceStatus = 'paid';
        }

        if ($request->method() == 'GET') {
            $data = [$products];

            return view('advocate.payment-review', compact('invoiceDataObj', 'products', 'invoiceStatus'));
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


            $payment_method = $request->payment_method;
            $paymentNonce = $request->payment_method_nonce;
            $invoiceID = $request->invoice_id;
            $orderID = $request->odr_id;
            $amount = $request->odr_total_amount ?? 10.00;

            if($payment_method==5)
            {
                $nonceFromTheClient = $request->payment_method_nonce;
                    $invoice_ach_customer = InvoiceAchCustomer::where('email',$request->email)->first();
                    if($invoice_ach_customer)
                    {
                        $invoice_cus_id = $invoice_ach_customer->customer_id;
                        $invoice_ach_user_id = $invoice_ach_customer->id;
                    }else{
                        //Create Customer
                        $result = $gateway->customer()->create([
                            'company' => $request->businessName,
                            //'lastName' => $request->last_name,
                            'email' => $request->email,
                            'phone' => $request->mobile
                            //'company' => $_POST['business-name'],
                            //'paymentMethodNonce' => $nonceFromTheClient
                          ]);

                          if ($result->success) {
                            $invoice_cus_id = $result->customer->id;

                          $invoice_ach_user_id =  InvoiceAchCustomer::insertGetId([
                                'business_name'=>$request->businessName,
                                'email'=>$request->email,
                                'phone'=> $request->mobile,
                                'customer_id'=>$invoice_cus_id,
                                'account_number'=> $request->account_number,
                                'routing_number'=>$request->routing_number,
                                'account_type'=>$request->account_type,
                                'ownership_type'=>$request->ownership_type]);


                          }
                        //   else {
                        //     foreach($result->errors->deepAll() AS $error) {
                        //         echo($error->code . ": " . $error->message . "\n");
                        //     }
                        //   }
                          // End Create Customer
                    }


                      $result = $gateway->paymentMethod()->create([
                        'customerId' => $invoice_cus_id,
                        'paymentMethodNonce' => $nonceFromTheClient,
                        'options' => [
                            'usBankAccountVerificationMethod' => UsBankAccountVerification::INDEPENDENT_CHECK
                        ]
                      ]);

                      if ($result->success) {

                        $vid =  $result->paymentMethod->token;
                         $usBankAccount = $result->paymentMethod;

                         $verified = $usBankAccount->verified;
                         $responseCode = $usBankAccount->verifications[0]->processorResponseCode;
                         //print_r($usBankAccount->verifications[0]->processorResponseCode);

                       }

                      $result = $gateway->transaction()->sale([
                        'amount' => $amount,
                        'paymentMethodToken' => $vid,
                        'deviceData' => "deviceDataFromTheClient",
                        'options' => [
                          'submitForSettlement' => True
                        ]
                      ]);
                      $payment_status = 'Settlement Pending';
            } else {
                $result = $gateway->transaction()->sale([
                    'amount' => $amount,
                    'paymentMethodNonce' => $paymentNonce,
                    'deviceData' => "deviceDataFromTheClient",
                    'options' => ['submitForSettlement' => True]
                ]);
                $payment_status = 'success';
            }



            $invoiceObj = null;
            if ($result->success) {
                $invoiceObj = Invoice::find($invoiceID);
                $invoiceObj->payment_method = $request->payment_method;
                $invoiceObj->odr_transaction_id = strtoupper($result->transaction->id);
                // $invoiceObj->odr_payment_status = $result->transaction->status;
                $invoiceObj->odr_payment_status = $payment_status;
                $invoiceObj->save();

                if($request->payment_method == 5)
                {
                    InvoiceAchCustomer::where('id',$invoice_ach_user_id)->update(['last_order_id'=>$invoiceID,'next_order_date'=>Carbon::now()->addMonth(),'is_subscribed'=>'1']);
                }

                Mail::to($invoiceObj->odr_email)->send(new OrderPlaced($invoiceObj, $products, true));

                try {
                    $body = "Congratulations " . $invoiceObj->odr_contact_name . " on confirming your path to hydration wellness ! We appreciate your interest in our products, and are here to support your goals. Remember DRINK WATR™.. STAY STRONG®";

                    $accountSid = getenv("TWILIO_ACCOUNT_SID");
                    $authToken = getenv("TWILIO_AUTH_TOKEN");
                    $client = new Client($accountSid, $authToken);
                    $client->messages->create(
                        '+1' . str_replace("-", "", $request->mobile),
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
                return redirect(route('invoice-route', ['paymentID' => $orderID]));
            } else {
                request()->session()->put('response_error_msg', 'payment failed');
                return redirect($request->url());
            }
            // return redirect()->back();
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
                    'odr_subtotal_amount' => $request->odr_subtotal_amount,
                    'odr_service_fee' => $request->odr_service_fee,
                    'odr_tax_amount' => $request->odr_tax_amount
                ]
            );
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function editInvoiceUser(Request $request)
    {
        try {
            $invoiceObj = Invoice::where('odr_id', $request->odr_id)->update(
                [
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
                    'odr_subtotal_amount' => $request->odr_subtotal_amount,
                    'odr_service_fee' => $request->odr_service_fee,
                    'odr_tax_amount' => $request->odr_tax_amount
                ]
            );
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
