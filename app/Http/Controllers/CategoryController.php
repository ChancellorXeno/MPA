<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;

class CategoryController extends Controller
{
    /**
     * Collect all the products in the requested category
     * 
     * @param $category the selected category
     */
    public function index($category){
        $product_id = ProductCategory::where('category_id', $category)->pluck('product_id');
        $products = Product::whereIn('id', $product_id)->get();
        
        return view('products-page', [
            'products' => $products
        ]);
    }
    /**
     * Collect all the products from the database
     */
    public function getAll(){
        $products = Product::get();

        return view('products-page', [
            'products' => $products
        ]);
    }
    /**
     * Collect a specific product
     * 
     * @param $id the product to be collected
     */
    public function getOne($id){
        $product = Product::where('id', $id)->get();
        $category_id = ProductCategory::where('product_id', $id)->pluck('category_id');
        $category = Category::where('id', $category_id)->get();

        return view('product', [
            'product' => $product,
            'category' => $category
        ]);
    }
}