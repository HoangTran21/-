<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    //
    public function showFormLogin(Request $request)
    {
        return view("admin.auth.login");
    }
    public function doLogin(Request $request)
    {
        $vadidate = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'min:6|max:255',
        ], [
            'email.email' => 'Email không đúng định dạng',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.max' => 'Mật khẩu không được quá 255 ký tự',
        ]);
        if (auth()->attempt($vadidate)) {
            request()->session()->regenerate();
            return view('admin.layouts.app');
        }
        return redirect()->route('loginAdmin')->withErrors([
            'error' => 'tai khoan mat khau khong dung'
        ]);
    }
    public function showFormRegister()
    {
        return view('admin.auth.register');
    }
    public function doRegister(Request $request)
    {
        $vadidate = $request->validate([
            'email' => 'required',
            'password' => 'required|confirmed|max:9',
            'name' => 'required|max:50'
        ]);
        User::create([
            'email' => $vadidate['email'],
            'name' => $vadidate['name'],
            'password' => Hash::make($vadidate['password'])
        ]);
        return 'them tai khoan thanh cong';

    }
}
