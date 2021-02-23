<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Color;

class CategoryController extends Controller
{
    public function index($category){
        $color = Color::where('category', $category)->get();

        return view('products-page', [
            'color' => $color
        ]);
    }
}