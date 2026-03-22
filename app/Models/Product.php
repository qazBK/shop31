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

    public function category()
    {
        return $this->hasOne(Category::class,'id','ctegory_id');
    }
}
