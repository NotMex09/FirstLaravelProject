<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    public function submit(Request $request)
{
    // Validate the request data
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'mobile' => 'required|string|max:20',
        'message' => 'required|string',
    ]);
   // Email data
   $data = [
    'name' => $request->first_name . ' ' . $request->last_name,
    'email' => $request->email,
    'mobile' => $request->mobile,
    'message' => $request->message,
];
    // Send email
    Mail::to('admin@techhorizons.com')->send(new ContactMail($data));
    // Process the form data (e.g., send an email, save to database)
    // For now, just redirect back with a success message
    return redirect()->route('contact')->with('success', '🚀 Your message has been successfully delivered! Our team will get back to you shortly. 💙');
}
}

