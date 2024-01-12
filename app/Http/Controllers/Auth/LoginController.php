<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginForm() : ViewView {
        return view('auth.login');
    }
}
