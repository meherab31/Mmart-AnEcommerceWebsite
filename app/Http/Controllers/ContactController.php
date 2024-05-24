<?php

namespace App\Http\Controllers;
use App\Models\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('contact', 'Your message has been sent successfully!');
    }

    public function discount(Request $request){
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $type = $request->input('type', 'General'); // Default type is 'General' if not provided

        Contact::create([
            'email' => $request->email,
            'type' => "discount",
        ]);

        return redirect()->back()->with('discount', 'You have subscribed successfully!');
    }
}
