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
        // send the user to the signup page
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
        // send the user to the login page
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
        // $username = Auth::user()->username;
        if (Auth::user()->username == 'admin'){
            $orders = Order::get();
        }else(
            $orders = Auth::user()->orders
        );
        
        $orders = $orders->reverse();
        // dd($orders);
        return view('history', ['orders' => $orders]);
    }
    public function deleteOrder($order_id){
        Order::where('id', $order_id)->delete();
        productOrder::where('order_id', $order_id)->delete();

        return view('history');
    }
}