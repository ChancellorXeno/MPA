<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($category){
        $color = \DB::table('colors')->where('category', $category)->first();

        dd($color);
    }
}
