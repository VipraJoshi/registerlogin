<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        if (Auth::check()) {
            return redirect('/citylist');
        }

        return view('login');
    }

    public function store(Request $request) {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required' 
        ]);
    
        if (Auth::attempt($attributes)) {
            $userIp = request()->ip();
            return redirect('/citylist')->with(['success' => 'You are logged in.']);

        } else {
                return redirect()->back()->withErrors($attributes)->withInput();
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
