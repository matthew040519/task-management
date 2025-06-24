<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only(['email', 'password']))) {
            // Authentication failed
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        $user = User::where('email', $request->email)->first();
        $request->session()->regenerate();
        $token = $user->createToken('API TOKEN')->plainTextToken;

        return redirect()->intended('dashboard');
    }

    public function register(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'password_confirm' => 'required|string|min:8|same:password',
        ]);

        if ($request->password !== $request->password_confirm) {
            return back()->withErrors([
                'password_confirm' => 'The password confirmation does not match.',
            ])->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);
        $token = $user->createToken('API TOKEN')->plainTextToken;

        return redirect()->intended('dashboard');
    }

    public function logout()
    {
        $user = User::find(Auth::user()->id);

        session()->invalidate();
        session()->regenerateToken();
        $user->tokens()->delete();
        // Auth::logout();

        return redirect('/');
    }
}
