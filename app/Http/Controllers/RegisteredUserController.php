<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;


class RegisteredUserController extends Controller
{
    public function create(){
        return view("auth.register");
    }
    public function store(Request $request){    
       
       $atributes = $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed'
    ]);
     
       $user = User::create($atributes);

       return redirect('/login');

    }

    
}
