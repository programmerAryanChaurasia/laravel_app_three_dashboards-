<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Determine where to redirect users based on their role
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->intended('/admin');
        } elseif ($user->role === 'teacher') {
            return redirect()->intended('/teacher');
        } elseif ($user->role === 'student') {
            return redirect()->intended('/student');
        } else {
            // Optionally, handle cases where the role is not set or unknown
            Auth::logout();
            return redirect('/login')->with('error', 'Your account does not have the correct permissions.');
        }
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
