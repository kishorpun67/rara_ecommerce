<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Session;

class ContactController extends Controller
{
    public function contactmessage()
    {
        $contactmessage = Contact::get();
        Session::flash('page', 'contactmessage');
        return view('admin.contact.view_contact_message', compact('contactmessage'));
    }

    public function detetecontactmessage($id)
    {
        Contact::where('id', $id)->delete();
        return redirect()->back()->with('success_message', 'Contact message has been delete successfully!');
    }

}
