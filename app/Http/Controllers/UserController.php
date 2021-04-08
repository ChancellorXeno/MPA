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
    /**
     * Send the user to the signup page
     */
    public function getRegister(){
        return view('register');
    }
    /**
     * Register a new account
     */
    public function postRegister(Request $request){
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
    /**
     * Send the user to the login page
     */
    public function getLogin(){
        return view('login');
    }
    /**
     * Log into an existing account
     */
    public function postLogin(Request $request){
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])){
            return view('index');
        }else{
            return back();
        }
    }
    /**
     * Log out of the active account
     */
    public function logout(Request $request){
        Auth::logout();

        $logout = new User();
        $logout->deleteSession($request);

        return redirect('/login');
    }
    /**
     * Collect the orders of active user 
     * Collect all orders if user is admin
     */
    public function history(){
        if (Auth::user()->username == 'admin'){
            $orders = Order::get();
        }else(
            $orders = Auth::user()->orders
        );
        
        $orders = $orders->reverse();
        return view('history', ['orders' => $orders]);
    }
    /**
     * Delete an order from the order history
     * 
     * @param $order_id the id of the order
     */
    public function deleteOrder($order_id){
        Order::where('id', $order_id)->delete();
        productOrder::where('order_id', $order_id)->delete();

        return view('history');
    }
}