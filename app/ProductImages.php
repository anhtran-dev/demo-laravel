<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $table = "product_images";

    // Relationship 1 - 1 vs 'products' (bảng phụ sang bảng chính)
    public function products(){
        return $this->belongsTo('App\Products','product_id','id');
    }
}
