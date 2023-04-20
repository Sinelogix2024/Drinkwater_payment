<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceAchCustomer extends Model
{
    use HasFactory;

    protected $table = 'invoice_ach_customers';

    protected $guarded = [];
}
