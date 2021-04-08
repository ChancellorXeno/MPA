<?php

namespace App\Models;

use Session;
use Auth;

Class Cart
{
    public $items = [];
    public $totalQty = 0;
    public $totalPrice = 0;

    function __construct()
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        if ($oldCart != null){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    /**
     * Add 1 to the quantity of the requested product
     * 
     * @param $item storedItem to save
     * @param id of $item
     * @param $cart location where $item is stored
     */
    public function add($item, $id, $request, $cart)
    {
        $request->session()->put('cart', $cart);
        $category_id = ProductCategory::where('product_id', $id)->value('category_id');
        $category = Category::where('id', $category_id)->value('name');

        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item, 'category' => $category];
        if ($this->items){
            if (array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }
    /**
     * Decrease the quantity of the requested product by 1
     * 
     * @param $id of product
     * @param $cart where quantity is saved
     */
    public function decrease($id, $cart)
    {
        Session::put('cart', $cart);
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }
    /**
     * Delete the entire quantity of the requested product
     * 
     * @param $id of product
     * @param $cart where quantity is saved
     */
    public function destroy($id, $cart)
    {
        Session::put('cart', $cart);
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
    /**
     * Save the cart to the database, along with user id
     * 
     * @param $cart that's being saved to the DB
     */
    public function checkout($cart){
        foreach($cart->items as $product){
            $productorder = new ProductOrder();
            $productorder->product_id = $product['item']['id'];
            $productorder->product_qty = $product['qty'];
            $productorder->order_id = Order::orderBy('id', 'desc')->value('id');
            $productorder->user_id = Auth::user()->orders()->value('user_id');
            $productorder->save();
        }
    }
    /**
     * Forget the current cart contents
     */
    public function forget(){
        Session::forget('cart');
    }
}