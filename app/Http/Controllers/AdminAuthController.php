<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash; 
class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admindashboard.login'); 
    }

    
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')
                             ->withErrors($validator)
                             ->withInput();
        }

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended('/admindashboard/dashboard');
        }

        return redirect()->route('login')
                         ->with('error', 'Invalid credentials, please try again');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}
