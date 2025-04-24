<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(Request $request){   
        
        $credentials = $request->validate([
            'email'=> 'required|email', 
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/home');
        }else{
                throw ValidationException::withMessages([
                    'email' => 'Email or password is incorrect'
                ]);
        }   
     }

     
     public function destroy(){
        Auth::logout();
        request()->session()->regenerateToken();
        return redirect('/login');
     }



}
