<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show(){
        return view('login.login');
    }
    public function login(Request $request){
        $credentials=['email'=>$request->email,'password'=>$request->password];
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return to_route('main');
        }else{
            // dump(Auth::attempt($credentials));
            return back()->withErrors([
                'login' => 'Email ou mot de passe incorrect',
            ])->onlyInput('email');
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();

        return to_route('login.index');
    }
}
