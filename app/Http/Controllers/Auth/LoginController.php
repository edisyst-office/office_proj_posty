<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        //PER IMPEDIRE CHE DA LOGGATO POSSA ANDARE IN QUELLA ROTTA
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function signin(Request $request)
    {
        //validation
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);
        //sign in
        if (!auth()->attempt($request->only('email', 'password'), $request->remember))
        {
            return back()->with('status', 'Credenziali errate');
        }
        //redirect
        return redirect()->route('dashboard');
    }
}
