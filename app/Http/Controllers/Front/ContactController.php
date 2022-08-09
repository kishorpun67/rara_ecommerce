<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function addContact(Request $request)
    {
        $data = $request->all();
        $contacts = new Contact;
        $contacts->name = $data['name'];
        $contacts->email = $data['email'];
        $contacts->subject = $data['subject'];
        $contacts->message = $data['message'];
        $contacts->save();
        return redirect()->back()->with('success_message', 'Your Message is sent successfully!');
    }
}
