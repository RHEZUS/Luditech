<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// one minute please

class AuthController extends Controller
{
    public function getLogin(){
        return view('dashboard.login.login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $admin_validate = auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'role' => 'ADMIN'
        ]);

        if($admin_validate){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with('error', 'Invalid credential try again!!');
        }

    }

    public function logout(){
        auth()->logout();
        return redirect()->route('getLogin')->with('success', 'Logged out successfully !!');
    }
}
