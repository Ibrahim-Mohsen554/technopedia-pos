<?php

namespace App\Models;

use App\Models\categories;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    protected $table = 'brands';
    public $timestamps = true;
    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(categories::class);
    }

}
