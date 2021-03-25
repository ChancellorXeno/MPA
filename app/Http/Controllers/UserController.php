<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
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
        $order = ProductOrder::get();
        $orders = Auth::user()->orders;

        dd($orders);
        return view('history', ['orders' => $orders]);
    }
}