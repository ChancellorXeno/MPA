<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        // render a list of a resource
        $amount = 1;
        $color = \DB::table('cart-contents')->where('quantity', '>=', $amount)->get();

        return view('cart', [
            'color' => $color
        ]);
    }

    public function create(){
        // shows a view to create a new resource

    }
    public function store($id){

        $collect = \DB::table('colors')->where('id', $id)->get();
        dd($collect);

        $color = new CartController();
        $color->name = $collect->name;
        $color->save();
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