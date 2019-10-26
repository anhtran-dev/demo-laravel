<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";

    // Relationship 1 - 1 vs 'category' (bảng phụ sang bảng chính)
    public function category(){
        return $this->belongsTo('App\Category','cate_id','id');
    }
    // Relationship 1 - n vs 'product_images' 
    public function productImg(){
        return $this->HasMany('App\productImages','product_id','id');
    }

    // Relationship 1 - 1 vs 'users'  (bảng phụ sang bảng chính)
    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
