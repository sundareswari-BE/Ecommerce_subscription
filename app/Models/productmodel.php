<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productmodel extends Model
{
    protected $table="products";
    protected $fillable = [
        'category_id',
        'product_name',
        'price',
        'description',
        'photo',
        'product_code',
        'status',

    ];
    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }
    use HasFactory;
}
