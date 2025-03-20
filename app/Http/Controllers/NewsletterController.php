<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterWelcome;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email|max:255',
        ]);
        
        // Create subscriber record
        $subscriber = NewsletterSubscriber::create([
            'email' => $request->email
        ]);
        
        try {
            // Send welcome email
            Mail::to($request->email)->send(new NewsletterWelcome());
            
            return back()->with('newsletter_success', 'Thanks for subscribing to our newsletter!');
        } catch (\Exception $e) {
            // Still save the subscriber even if email fails
            \Log::error('Newsletter welcome email failed: ' . $e->getMessage());
            
            return back()->with('newsletter_success', 'Thanks for subscribing to our newsletter! (Email notification may be delayed)');
        }
    }
}