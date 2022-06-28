<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        
        request()->validate([
            'email' => ['required', 'email'],
        ]);
    
        
        try {

            (new Newsletter())->subscribe(request('email')); 

        } catch (\Exception $e) {

            throw ValidationException::withMessages([
                'email' => 'This email could not be subscribe to our newsletter!'
            ]);

        }
    
        return redirect('/')
                ->with('success', 'You are now signed up for our newsletter!');
    }
}
