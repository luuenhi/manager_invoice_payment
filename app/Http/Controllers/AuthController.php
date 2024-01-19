<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Login
     *
     * @return view
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Post Login
     *
     * @return view
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $input = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('web')->attempt($input, $request->remember)) {
            return redirect()->intended(Route('invoices.index'));
        }

        return redirect()->back()->withInput($request->only('email','remember'))
            ->withErrors(['email' => 'Tài khoản không tồn tại!']);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect()->route( 'login');
    }
}
