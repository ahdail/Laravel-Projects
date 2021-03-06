<?php
namespace Ecommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function products()
    {
        return $this->belongsToMany('Ecommerce\Product');
    }
}