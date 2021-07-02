<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $table = 'image';

    public function product()
    {
        return $this->hasOne(Subcategory::class);
    }
}
