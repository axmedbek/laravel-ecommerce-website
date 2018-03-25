<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function login(){
        if (request()->isMethod('POST')){
            $this->validate(request(),[

                'email' => 'required|email',
                'password' => 'required'
            ]);
            $credentials = [
              'email' => request('email'),
              'password' =>request('password'),
              'is_admin' => 1
            ];
            if (Auth::guard('admin')->attempt($credentials,request()->has('rememberme'))){
                return redirect()->route('admin.home');
            }
            else{
                return back()->withInput()->withErrors([
                    'email' => 'Girişdə xəta baş verdi'
                ]);
            }
        }
        return view('admin.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        request()->session()->flush();
        request()->session()->regenerate();

        return redirect()->route('admin.login');
    }

    public function index(){
        return view('admin.home');
    }
}
