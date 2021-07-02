<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Class Products
 * @package App\Models
 * @mixin Builder
 */
class Products extends Model
{
    use HasFactory;

    public $table = 'products';

    public function subcategory()
    {
        return $this->hasOne(Subcategory::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }

    public function variants()
    {
        return $this->hasMany(ProductVariants::class, 'product_id', 'id');
    }
}
