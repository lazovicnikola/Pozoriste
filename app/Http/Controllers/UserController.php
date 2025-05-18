<?php

namespace App\Http\Controllers;

use App\Models\User;


class UserController extends Controller
{
    public function destroy(User $user) {
        $user->delete();
        return redirect('/profile')->with('success', 'Korisnik ' . $user->name . ' je uspješno izbrisan.');
    }
}
