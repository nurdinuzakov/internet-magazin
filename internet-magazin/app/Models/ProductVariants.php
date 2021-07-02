<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model
{
    protected $table = 'variants';

    public function productSize()
    {
        return $this->hasOne(ProductSize::class, 'size_id', 'id');
    }

    public function productColor()
    {
        return $this->hasOne(ProductColor::class, 'color_id', 'id');
    }

    public function product()
    {
        return $this->hasOne(Products::class, 'product_id', 'id');
    }
}
