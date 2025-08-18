<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(){
        return view('authentication.login');
    }
    public function showRegister(){
        return view('authentication.register');
    }
    public function register(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:100',
                'surname' => 'required|string|max:100',
                'email' => 'required|string|email|unique:users',
                'phone' => 'string|max:13',
                'password' => 'required|string|min:5',
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('user');

        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if($user->hasRole('admin')){
                return redirect()->route('home');

            }

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Le credenziali non sono corrette',
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Logout effetuato con successo');
    }
}
