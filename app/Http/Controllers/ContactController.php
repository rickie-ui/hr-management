<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function store(Request $request){
        // validating request
          $formFields = $request->validate([
            'full_name' => 'required|max:255',
            'email' => 'required|email:strict,dns',
            'subject' => 'required',
            'message' => 'required',
        ]);

         Contact::Create($formFields);

        return redirect()->back()->with('status', 'Sent!, we will get back to you soon');
    }
}

