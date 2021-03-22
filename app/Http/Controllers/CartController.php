<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Color;
use App\Models\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth; 

class CartController extends Controller
{
    public function index(){
        // render a list of a resource

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function create(){
        // shows a view to create a new resource

    }
    public function store(Request $request, $id){ 
        //in progress

        $product = Color::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }
    public function decrease($id)
    {
        // decrease amount of selected product by one
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->decrease($id);
        Session::put('cart', $cart);

        return redirect()->back();
    }
    public function destroy($id){
        // Delete the resource
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->destroy($id);
        Session::put('cart', $cart);

        return redirect()->back();
    }
    public function checkout(){
        // Collect the instance
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        // Dump in database
        $order = new Order();
        $order->cart = serialize($cart);

        Auth::user()->orders()->save($order);
        // $order->name = $request->input('name');

        // Wipe the cart
        Session::forget('cart');
    }
}