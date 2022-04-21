<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'SIM Inventaris : msInventaris | Login'
        ]);
    }

    public function dashboard(){
        return view('dashboard', [
            "title" => "SIM Inventaris : msInventaris",
            "judul" => "msInventaris"
        ]);
    }

    public function login(Request $request)
    {
        $credentials= $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
