<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ]);
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('login')->withErrors([
                'success' => 'Вы успешно вошли в систему'
            ]
            );
        }
        return back()->withErrors([
            'error'=>'Ошибка аутентификации, повторите попытку',
        ])->onlyInput('email','password');
    }

    public function login(Request $request)
    {
        return view('login',['user'=>Auth::user()]);
    }

    public function logout(Request $request):RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
