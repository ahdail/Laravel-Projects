<?php

namespace Ecommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'featured',
        'recommended'
    ];

    public function category (){
        return $this->belongsTo('Ecommerce\Category');
    }

}
