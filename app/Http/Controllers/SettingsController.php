<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class SettingsController extends Controller
{



    public function index()
    {
        return view('settings', [
            'user' => Auth::user()
        ]);
    }


    public function update(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:6|confirmed', 
        ]);

        if ($request->filled('old_password')) {
            if (!Hash::check($request->old_password, Auth::user()->password)) {
                return redirect()->back()->withErrors([
                    'old_password' => 'The provided old password is incorrect.',
                ]);
            }
        }
    

        if ($request->filled('password') && Hash::check($request->password, Auth::user()->password)) {
            return redirect()->back()->withErrors([
                'password' => 'New password cannot be the same as the old password.',
            ]);
        }
    
   
        if ($request->filled('password')) {
            $attributes['password'] = bcrypt($attributes['password']);
        } else {
            unset($attributes['password']); 
        }
    
        $user = Auth::user()->id;
        $userFind = User::find($user);
        $userFind->update($attributes);
    
        return redirect('/shows')->with('success', 'Profile updated successfully.');
    }
}
