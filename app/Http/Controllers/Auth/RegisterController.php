<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
        // validation

        $this -> validate($request, [
            'name' => 'required|max:255',
            'username' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'required',
            'password_confirmed' => 'required|same:password',
        ]);

        User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => Hash::make($request -> password),
            'username' => $request -> username,
        ]);

        auth()->attempt($request->only('email', 'password'));
        
        return redirect() -> route('dashboard'); 
    }
}
