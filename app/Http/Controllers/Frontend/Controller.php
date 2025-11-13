<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends \Illuminate\Routing\Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return redirect('/login')->withErrors(['error' => 'Login gagal, periksa email dan password.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function menu()
    {
        return view('menu');
    }

    public function testimoni()
    {
        return view('testimoni');
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function storeContact(Request $request)
    {
        // Logika penyimpanan kontak
    }

    public function storeOrder(Request $request)
    {
        // Logika penyimpanan order
    }
}
