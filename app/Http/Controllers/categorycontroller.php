<?php

namespace App\Http\Controllers;
use App\Models\categorymodel;
use App\Models\productmodel;
use Illuminate\Http\Request;

class categorycontroller extends Controller
{
  
    public function categoryPage(Request $request)
    {
        $categories = CategoryModel::all();
        $categoryId = $request->input('category_id');
    
      
        if ($categoryId) {
            $category = CategoryModel::findOrFail($categoryId);
            $productsQuery = $categoryId->products();
        } else {
            $categoryId = null; 
            $productsQuery = ProductModel::query();
        }
    
      
        $searchResults = $request->session()->get('products', null);
        if ($searchResults) {
            $products = $searchResults['products'];
            $categories = $searchResults['categories'];
        } else {
           
            $searchQuery = $request->input('search');
            if ($searchQuery) {
                $productsQuery->where('product_name', 'like', '%' . $searchQuery . '%');
            }
            $products = $productsQuery->get();
        }
    
        return view('userpages.category', compact('categories', 'products', 'categoryId'));
    }
    
}

