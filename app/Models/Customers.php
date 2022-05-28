<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{

    protected $table = 'customers';
    public $timestamps = true;
    protected $fillable = array('customer_name', 'Customer_email', 'Phone_number', 'company_name', 'customer_address');

}
