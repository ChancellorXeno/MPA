<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Color;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class CartController extends Controller
{
    public function index(){
        // render a list of a resource
        // $amount = 1;
        // $color = \DB::table('cart-contents')->where('quantity', '>=', $amount)->get();

        // return view('shopping-cart', [
        //     'color' => $color
        // ]);

        if (!Session::has('cart')){
            return view('shop.shopping-cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function create(){
        // shows a view to create a new resource

    }
    public function store(Request $request, $id){ //in progress
        $product = Color::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('index');
    }
    public function edit(){
        // Show a view to edit an existing resource

    }
    public function update(){
        // Persist the edited resource

    }
    public function destroy(){
        // Delete the resource

    }
}