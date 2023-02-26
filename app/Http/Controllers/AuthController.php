<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Contructiong file
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show login form
     *
     * @param Request $request
     * @return Response
     */
    public function showLoginForm(Request $request)
    {
        return view('auth.login', [
            'page_title' => 'Login'
        ]);
    }

    /**
     * Process login logic
     *
     * @param Request $request
     * @return Response
     */
    public function login(Request $request)
    {
        // dd($request->all());
        $user = User::where('username', $request->username)
            ->where('is_active', true)
            ->first();

        if (is_null($user)) {
            return redirect()
                ->back()
                ->with('error', trans('auth.not_found'));
        } else {
            if ($user->is_active == 1) {
                if (Auth::attempt([
                    'username' => $request->username,
                    'password' => $request->password
                ])) {
                    return redirect()->route('dashboard');
                } else {
                    return redirect()
                        ->back()
                        ->with('error', trans('auth.not_found'));
                }
            } else {
                return redirect()
                    ->back()
                    ->with('error', trans('auth.not_found'));
            }
        }

        return back()->withInput($request->only('username', 'remember'));
    }

    public function logout()
    {
        if (auth()->check()) {
            auth()->logout();
            return redirect()->route('login.form');
        }
    }
}
