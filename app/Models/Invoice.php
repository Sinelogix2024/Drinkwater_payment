<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = "invoices";

    public static function getLastOrderId()
    {
       $last_row = Invoice::orderBy('id', 'desc')->first();
       return $last_row->odr_id;
    }

    public function lastOrder()
    {
        return $this->hasOne('App\Models\InvoiceAchCustomer', 'last_order_id', 'id');
    }

}
