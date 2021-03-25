<?php

namespace App\Models;

use Session;

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
    public function getItems()
    {
        return $this->items;
    }
    public function add($item, $id, $request, $cart)
    {
        // adds 1 to the quantity of the requested product
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
    public function decrease($id, $cart)
    {
        // decrease the quantity of the requested product by 1
        Session::put('cart', $cart);
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }
    public function destroy($id, $cart)
    {
        // delete the entire quantity of the requested product
        Session::put('cart', $cart);
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
    public function forget(){
        Session::forget('cart');
    }
}