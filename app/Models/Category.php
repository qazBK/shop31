<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   //$fillable == заподняеиый
    protected $fillable = [
        'title',
        'description'
    ];

    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }
}
