<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;
//use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'fullName' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        Contact::create($validateData);
        return back()->with('success', 'message sent');
    }
}
