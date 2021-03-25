<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
    public function index(){
        // render a list of a resource
        $cart = new Cart();

        return view('shopping-cart', [
            'products' => $cart->items,
            'totalPrice' => $cart->totalPrice
        ]);
    }
    public function store(Request $request, $id){ 
        // places the requested product in the cart
        $product = Product::find($id);
        $cart = new Cart();
        $cart->add($product, $product->id, $request, $cart);

        return redirect()->back();
    }
    public function decrease($id)
    {
        // decrease amount of selected product by one
        $cart = new Cart();
        $cart->decrease($id, $cart);

        return redirect()->back();
    }
    public function destroy($id){
        // Delete the resource
        $cart = new Cart();
        $cart->destroy($id, $cart);

        return redirect()->back();
    }
    public function checkout(){
        // confirm an order
        $cart = new Cart();
        $order = new Order();

        Auth::user()->orders()->save($order);
        
        foreach($cart->items as $product){
            $productorder = new ProductOrder();
            $productorder->product_id = $product['item']['id'];
            $productorder->order_id = Order::orderBy('id', 'desc')->value('id');
            $productorder->user_id = Auth::user()->value('id');
            // dd($productorder->user_id);
            $productorder->save();
        }

        // Wipe the cart
        $cart->forget();
        return redirect()->route('home');
    }
}