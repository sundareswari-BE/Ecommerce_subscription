<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorymodel extends Model
{
    protected $table = "category";
    protected $fillable = [
        'category_name',

    ];

    public static function addcategory($data)
    {
        {
            $category = new CategoryModel();
            $category->category_name = $data['category_name'];
            $category->save();
        }
    }
    use HasFactory;
}
