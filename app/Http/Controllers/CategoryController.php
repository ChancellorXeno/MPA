<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;

class CategoryController extends Controller
{
    public function index($category){
        // collect all the products in the requested category
        $product_id = ProductCategory::where('category_id', $category)->pluck('product_id');
        $products = Product::whereIn('id', $product_id)->get();
        
        return view('products-page', [
            'products' => $products
        ]);
    }
    public function getAll(){
        // collect all products
        $products = Product::get();

        return view('products-page', [
            'products' => $products
        ]);
    }
    public function getOne($id){
        // collect a specific product
        $product = Product::where('id', $id)->get();
        $category_id = ProductCategory::where('product_id', $id)->pluck('category_id');
        $category = Category::where('id', $category_id)->get();

        return view('product', [
            'product' => $product,
            'category' => $category
        ]);
    }
}