<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\ProductOrder;
use Auth;

class UserController extends Controller
{
    public function getRegister(){
        return view('register');
    }
    public function postRegister(Request $request){
        // register a new account
        $validated = $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required|min:3'
        ]);

        $user = new User([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();

        return redirect()->route('user.login');
    }

    public function getLogin(){
        return view('login');
    }
    public function postLogin(Request $request){
        // log into an existing account
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])){
            return view('index');
        }else{
            return back();
        }
    }
    public function logout(Request $request){
        // log out of the active account
        Auth::logout();

        $logout = new User();
        $logout->deleteSession($request);

        return redirect('/login');
    }
    public function history(){
        // shows the order history of the currently logged in user
        $usercheck = Auth::user()->orders;
        foreach($usercheck as $user){
            $user_id = $user->user_id;
        }
        $orders = Order::
        where('user_id', $user_id)->orderBy('id', 'DESC')->get();

        return view('history', ['orders' => $orders]);
    }
}






// $usercheck = Auth::user()->orders;
// foreach($usercheck as $order){
//     $user_id = $order->user_id;
// }
// $orders = ProductOrder::where('user_id', $user_id)->get();
// foreach($orders as $order){
//     $order->product = Product::where('id', $order->product_id)->get();
//     foreach($order->product as $item){
//         $item['price'] = $item['price'] * $order->product_qty;
//         $order->totalPrice = $order->totalPrice + $item['price'];
//     }
//     dd($order);
// }