<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth; 

class CartController extends Controller
{
    public function index(){
        // render a list of a resource
        $cart = new Cart();
        return view('shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
    public function store(Request $request, $id){ 
        // places the requested product in the cart
        $product = Product::find($id);
        $cart = new Cart();
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart); // replace to model
        return redirect()->back();
    }
    public function decrease($id)
    {
        // decrease amount of selected product by one
        $cart = new Cart();
        $cart->decrease($id);
        Session::put('cart', $cart);

        return redirect()->back();
    }
    public function destroy($id){
        // Delete the resource
        $cart = new Cart();
        $cart->destroy($id);
        Session::put('cart', $cart);

        return redirect()->back();
    }
    public function checkout(){
        // confirm an order
        $cart = new Cart();
        $order = new Order();

        $order->cart = serialize($cart); // find alternative
        Auth::user()->orders()->save($order);
        // Wipe the cart
        Session::forget('cart'); // replace to model

        return redirect()->route('home');
    }
}