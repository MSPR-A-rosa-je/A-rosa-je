<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'dashboard']);
    }

    /**
     * Display a registration form.
     *
     * @return Response
     */
    public function register()
{
    return response()->view('auth.register');
}

    /**
     * Store a new user.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pseudo'     => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'birth_date' => 'required|date',
            'password'   => 'required|string|min:6',
        ]);

        User::create([
            'is_botanist'   => false,
            'is_admin'      => false,
            'creation_date' => now(),
            'pseudo'        => $request->pseudo,
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'birth_date'    => $request->birth_date,
            'password'      => Hash::make($request->password),
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();

        return redirect()->route('dashboard')->withSuccess('You have successfully registered & logged in!');
    }

    /**
     * Display a login form.
     *
     * @return Response
     */
    public function login()
    {
        return response()->view('auth.login');
    }

    /**
     * Authenticate the user.
     *
     * @param Request $request
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard')->withSuccess('You have successfully logged in!');
        }

        return response()-> back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    /**
     * Display a dashboard to authenticated users.
     *
     * @return Response
     */
    public function dashboard()
    {
        if (Auth::check()) {
            return response ()->view('auth.dashboard');
        }

        return response ()->redirect()
                   ->route('login')
                   ->withErrors([
                       'email' => 'Please login to access the dashboard.',
                   ])
                   ->onlyInput('email');
    }

    /**
     * Log out the user from application.
     *
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->withSuccess('You have logged out successfully!');
    }
}
