<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'usertype' => ['required','string'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'usertype' => $request->usertype,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        switch ($user->usertype) {
            case 'admin':
                $route = 'admin.dashboard';
                break;
            case 'hrm':
                $route = 'hr.dashboard';
                break;
            case 'compliance':
                $route = 'compliance.dashboard';
                break;
            case 'merchandiser':
                $route = 'merchant.dashboard';
                break;
            case 'operation':
                $route = 'operation.dashboard';
                break;
            default:
                $route = '/'; // Default route if usertype does not match
                break;
        }
    
        return redirect()->route($route);
    }
}
