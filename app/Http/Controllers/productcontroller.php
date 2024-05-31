<?php
namespace App\Http\Controllers;
use App\Models\productmodel;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        {
            $products = ProductModel::all();
            return view('userpages.dashboard', compact('products'));
        }
    }

    public function getProducts()
    {
        return response()->json(productmodel::all());
    }
}
