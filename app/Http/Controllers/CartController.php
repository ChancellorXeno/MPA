<?php

namespace App\Http\Controllers;

use App\Classes\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\Order;
use App\Models\ProductOrder;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth; 

class CartController extends Controller
{
    /**
     * Render a list of a resource
     */
    public function index(){
        // 
        $cart = new Cart();

        return view('shopping-cart', [
            'products' => $cart->items,
            'totalPrice' => $cart->totalPrice
        ]);
    }
    /**
     * Places the requested product in the cart
     * 
     * @param $id (is?) the requested product
     */
    public function store(Request $request, $id){ 
        $product = Product::find($id);
        $cart = new Cart();
        $cart->add($product, $product->id, $request, $cart);

        return redirect()->back();
    }
    /**
     * Decrease amount of selected product by one
     * 
     * @param $id the selected product
     */
    public function decrease($id)
    {
        $cart = new Cart();
        $cart->decrease($id, $cart);

        return redirect()->back();
    }
    /**
     * Delete the resource
     * 
     * @param $id the selected product
     */
    public function destroy($id){
        $cart = new Cart();
        $cart->destroy($id, $cart);

        return redirect()->back();
    }
    /**
     * Saves current cart to the Database
     */
    public function checkout(){
        // confirm an order
        $order = new Order();
        Auth::user()->orders()->save($order);
        
        // send cart to DB
        $cart = new Cart();
        $cart->checkout($cart);

        // Wipe the cart
        $cart->forget();
        return redirect()->route('home');
    }
}