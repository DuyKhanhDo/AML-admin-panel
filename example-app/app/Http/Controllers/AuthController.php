<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 

class AuthController extends Controller
{
    const PATH_VIEW = 'auths.';
    public function viewlogin()
    {
        return view(self::PATH_VIEW . 'login');
    
    }
    public function viewregister()
    {
        return view(self::PATH_VIEW . 'register');
    
    }
    public function user()
    {
        return view(self::PATH_VIEW . 'user');
    
    }
    public function register(Request $request)
    {
        // Tạo người dùng mới
      
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return view(self::PATH_VIEW . 'login');
    }
    public function login(Request $request)
    {
     
        $credentials = $request->only('email', 'password');

    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role == 1) {
                return redirect()->route('dashboard');
                
            } else {
                return redirect()->route('user');
                
            }
        }
    
        return redirect()->back()->withErrors(['error' => 'Sai tài khoản hoặc mật khẩu']);
    }
}
