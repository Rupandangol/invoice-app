<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm() : ViewView {
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$request->remember_me??'false')){
            return redirect()->intended('invoices');
        } else{
            return redirect()->back()->with('fail','Invalid Credentials');
        }
    }

    public function logout() {
        Auth::guard('web')->logout();
        return redirect(route('login'))->with('success','Logged out');
    }
}
