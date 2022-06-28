<?php

namespace App\Http\Controllers;

use App\Services\MailchimpNewsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    // automatic resolution 
    // public function __invoke(Newsletter $newsletter($newsletter = new Newsletter))
    // {
    //     # code...
    // }

    public function __invoke(MailchimpNewsletter $newsletter)
    {
        
        request()->validate([
            'email' => ['required', 'email'],
        ]);
    
        
        try {

            $newsletter->subscribe(request('email')); 

        } catch (\Exception $e) {

            throw ValidationException::withMessages([
                'email' => 'This email could not be subscribe to our newsletter!'
            ]);

        }
    
        return redirect('/')
                ->with('success', 'You are now signed up for our newsletter!');
    }
}
