<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class CategoryController extends Controller
{
    public function index($category){
        // collect all the products in the requested category
        $products = Product::where('category', $category)->get();

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

        return view('product', [
            'product' => $product
        ]);
    }
}