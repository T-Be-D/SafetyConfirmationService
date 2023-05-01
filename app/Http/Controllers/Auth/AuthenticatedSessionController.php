<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $credentials = $request->only('studentID', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();

    //         //return redirect()->intended(RouteServiceProvider::HOME);

    //         return redirect()->intended('confirm');
    //     }

    //     return back()->withErrors([
    //         'student_id' => 'The provided credentials do not match our records.',
    //     ]);
    // }


    public function login(Request $request)
    {
        $credentials = $request->only('studentID', 'password');
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Authentication passed...
            $user = Auth::user();
            Log::info('Current user: ' . $user->name);
            return view('home', ['user' => $user]);
        }
        return redirect()->back()->withInput($request->only('studentID', 'remember'))->withErrors([
            'student_id' => 'These credentials do not match our records.',
        ]);
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
