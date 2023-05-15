<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;

use App\Models\InvoiceAchCustomer;
use App\Models\Invoice;
use Carbon\Carbon;


use Exception;
use Braintree\Gateway;
use Twilio\Rest\Client;
use App\Models\Advocate;
use App\Models\Order;
use App\Models\AchCustomer;
use App\Mail\OrderPlaced;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Braintree\Result\UsBankAccountVerification;
use Braintree\PaymentMethodNonce;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Advocate\AdvocateController;

class RecurringOrderCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'RecurringOrder:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $today_order = InvoiceAchCustomer::where('next_order_date',Carbon::today())->with('lastOrder')->get();
        foreach($today_order as $order)
        {
           // \Log::info($order->id);exit;
            $odr_id = Invoice::getLastOrderId();
         $orderId =   Invoice::insertGetId([
                'odr_id'=>$odr_id+1,
                'odr_contact_name'=>$order->lastOrder->odr_contact_name,
                'odr_company_name'=>$order->lastOrder->odr_company_name,
                'odr_email'=>$order->lastOrder->odr_email,
                'odr_mobile'=>$order->lastOrder->odr_mobile,
                'odr_product'=>$order->lastOrder->odr_product,
                'billing_address'=>$order->lastOrder->billing_address,
                'billing_address2'=>$order->lastOrder->billing_address2,
                'b_city_state_zip'=>$order->lastOrder->b_city_state_zip,
                'payment_method'=>'5',
                'odr_transaction_id'=>null,
                'odr_payment_status'=>null,
                'delivery_fee'=>$order->lastOrder->delivery_fee,
                'odr_total_amount'=>$order->lastOrder->odr_total_amount,
                'odr_tax_amount'=>$order->lastOrder->odr_tax_amount,
                'odr_service_fee'=>$order->lastOrder->odr_service_fee,
                'odr_subtotal_amount'=>$order->lastOrder->odr_subtotal_amount,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()


            ]);
          //  \Log::info($order->id.'  ===  '.$orderId );
            InvoiceAchCustomer::where('id',$order->id)->update(['last_order_id'=>$orderId,'next_order_date'=>Carbon::now()->addMonth()]);
        }



    //     $gateway = new Gateway([
    //         'environment' => env('BRAINTREE_ENV'),
    //         'merchantId' => env('BRAINTREE_MERCHANT_ID'),
    //         'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
    //         'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
    //         'acceptGzipEncoding' => false,
    //     ]);




    //    $result = $gateway->paymentMethod()->create([
    //     'customerId' => '83355745751',
    //     'paymentMethodNonce' =>  \View::make('advocate.us-bank-account-token')->render(),
    //     'options' => [
    //         'usBankAccountVerificationMethod' => UsBankAccountVerification::INDEPENDENT_CHECK
    //     ]
    //   ]);
    //   \Log::info($result);
    //   if ($result->success) {

    //     $vid =  $result->paymentMethod->token;
    //      $usBankAccount = $result->paymentMethod;

    //      $verified = $usBankAccount->verified;
    //      $responseCode = $usBankAccount->verifications[0]->processorResponseCode;
    //      //print_r($usBankAccount->verifications[0]->processorResponseCode);

    //    }

    //   $result = $gateway->transaction()->sale([
    //     'amount' => '10.00',
    //     'paymentMethodToken' => $vid,
    //     'deviceData' => "deviceDataFromTheClient",
    //     'options' => [
    //       'submitForSettlement' => True
    //     ]
    //   ]);




    }
}


