<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $form = request()->validate([
            "name" => ['required', 'max:255'],
            "username" => [
                'required', 'min:3', 'max:255', 'unique:users,username'
                 /**alt mth Rule::unique("users table","username column")->ignore("JoneDoe username") */
            ],
            "email" => ['required', 'email', 'max:255', 'unique:users,email'],
            "password" => ['required', 'min:8', 'max:255'],
        ]);

        User::create($form);

        return redirect("/");
    }
}
