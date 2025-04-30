<?php

namespace App\Http\Controllers;
use App\Models\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }
      public function Contact_us(Request $request)
    {
        $contacts = new Contact;
        $contacts->name = $request['name'];
        $contacts->email = $request['email'];
        $contacts->message = $request['message'];
        $contacts->save();

     return redirect()->back()->with('success', 'Your message has been submitted. We will contact you very soon.');

    }

}