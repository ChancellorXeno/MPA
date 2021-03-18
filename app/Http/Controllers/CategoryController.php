<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Color;

class CategoryController extends Controller
{
    public function index($category){
        $colors = Color::where('category', $category)->get();

        return view('products-page', [
            'colors' => $colors
        ]);
    }
}