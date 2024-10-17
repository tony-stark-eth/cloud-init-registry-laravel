<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class AuthController
{
    /** @throws ValidationException */
    public function loginOrCreate(Request $request): RedirectResponse
    {
        User::firstOrCreate(
            $request->only('email'),
            [
                'name' => $request->input('email'),
                'password' => $request->input('password'),
            ]
        );

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        return Redirect::to('/');
    }
}
