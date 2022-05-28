<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('sku_num', 'product_name', 'product_desc', 'brand_id', 'category_id', 'Qty_instock', 'buy_price', 'sell_price');

}
