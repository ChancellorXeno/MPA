<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

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

        return redirect()->route('login');
    }

    public function getLogin(){
        return view('login');
    }
}