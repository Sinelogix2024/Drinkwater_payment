<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    protected $advocateData;
    protected $orderData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($advocateData, $orderData, $isInvoice = false)
    {
        $this->advocateData = $advocateData;
        $this->orderData = $orderData;
        $this->isInvoice = $isInvoice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fromEmail = env('MAIL_FROM_ADDRESS');
        // $fromEmail = 'receipt@drinkwatr.com';
        if ($this->isInvoice) {
            $invoiceDataObj = $this->advocateData;
            $products = $this->orderData;
            $invoiceStatus = 'paid';

            return $this->from($fromEmail, env('MAIL_FROM_NAME', 'DrinkWater.com'))
                ->subject('YOUR WELLNESS PATH CONFIRMED | DRINK WATR. STAY STRONG®️')
                ->view('emails.payment', compact('invoiceDataObj', 'products', 'invoiceStatus'));
            // ->view('advocate.payment-review', compact('invoiceDataObj', 'products', 'invoiceStatus'));
        } else {
            return $this->from($fromEmail, env('MAIL_FROM_NAME', 'DrinkWater.com'))
                ->subject('YOUR WELLNESS PATH CONFIRMED | DRINK WATR. STAY STRONG®️')
                ->view('emails.order_placed_new', [
                    'advocateData' => $this->advocateData,
                    'orderDetail' => $this->orderData,
                ]);
        }
    }
}