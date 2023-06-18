<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('auth/login');
        }

        // return view('admin/auth/login');
    }

    // /**
    //  * Show login form
    //  *
    //  * @param Request $request
    //  * @return Response
    //  */
    // public function showLoginForm(Request $request)
    // {
    //     return view('auth.login', [
    //         'page_title' => 'Login'
    //     ]);
    // }

    /**
     * Process login logic
     *
     * @param Request $request
     * @return Response
     */
    public function login(Request $request)
    {
        $user = User::where('username', $request->username)
            ->first();

        if (is_null($user)) {
            return redirect()
                ->back()
                ->with('error', 'Tidak dapat menemukan akun!');
        } else {
            if (Auth::attempt([
                'username' => $request->username,
                'password' => $request->password
            ])) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()
                    ->back()
                    ->with('error', 'Username dan Password yang anda masukan salah!');
            }
        }

        return back()->withInput($request->only('username', 'remember'));
    }

    public function logout()
    {
        if (auth()->check()) {
            auth()->logout();
            return redirect()->route('admin.login');
        }
    }
}
