<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function getRegister(){
        return view('register');
    }
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

    public function getLogin(){
        return view('login');
    }
    public function postLogin(Request $request){
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])){
            return redirect()->route('home');
        }
    }
}