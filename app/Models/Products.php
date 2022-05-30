<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\categories;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    protected $table = 'products';
    public $timestamps = true;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(categories::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

}
