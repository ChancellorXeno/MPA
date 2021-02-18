<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show(){
        $amount = 1;
        $color = \DB::table('cart-contents')->where('quantity', '>=', $amount)->get();

        return view('cart', [
            'color' => $color
        ]);
    }
}