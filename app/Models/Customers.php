<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{

    protected $table = 'customers';
    public $timestamps = true;
    protected $fillable = array('customer_name', 'customer_phone', 'customer_address', 'customer_email', 'c_type','company_name','created_by');

}
