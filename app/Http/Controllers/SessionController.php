<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('session.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect("/")->with('success', "Welcome Back!");
        }

        throw ValidationException::withMessages([
            "email" => "Your email or password couldn't find."
        ]);

        // Alt

        // return back()
        //     ->withInput()
        //     ->withErrors([
        //         "email" => "Your email or password couldn't find."
        //     ]);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
