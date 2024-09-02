<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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

        // $user = $request->user();
        $user = auth()->user();

        if ($user->usertype === 'admin') {
            return redirect()->route('admin.dashboard');
        }
    
        // Redirect other users to their specific dashboards
        switch ($user->usertype) {
            case 'hrm': //usertypes
                return redirect()->route('hr.dashboard');
            case 'compliance': 
                return redirect()->route('compliance.dashboard');
            case 'merchandiser': 
                return redirect()->route('merchant.dashboard');
            case 'operation': 
                return redirect()->route('operation.dashboard');
            default:
                return redirect()->route('/');
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
