<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('public.components.auth.login');
    }
    public function register()
    {
        return view('public.components.auth.register');
    }
    function registercontrol(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|Min:6',
            'password_confirmation' => 'required'
        ]);

        $user = User::create(
            [
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password),
            ]
        );

        if ($user) {
            return redirect(route('login'))->with('success', 'Kayıt İşlem Başarılı');
        }
        return back()->with('error', 'İşlem Başarısız');
    }

    public function logincontrol(Request $request)
    {
        $request->flash();
        $formcontrol = $request->only('email', 'password');
        $remember = $request->has('beni_hatirla') ? true : false;
        if (Auth::attempt($formcontrol, $remember)) {
            return redirect()->intended(route('admin.index'));
        } else {
            return back()->with('error', 'Hatalı Kullanıcı adı veya şifre');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'))->with('success', 'Güvenli Çıkış Yapıldı');
    }
}
