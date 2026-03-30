<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'categories',
        'name',
        'description',
        'price',
    ];

    public function products()
    {
        return $this->hasMany(Product::class,'id','ctegory_id');
    }
}
