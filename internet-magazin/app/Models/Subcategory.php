<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Class Subcategory
 * @package App\Models
 * @mixin Builder
 */
class Subcategory extends Model
{
    public $table = 'subcategory';

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Products::class, 'subcategory_id', 'id');
    }
}
