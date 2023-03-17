<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchCustomer extends Model
{
    use HasFactory;
    protected $table = 'ach_customers';

    protected $guarded = [];

}
