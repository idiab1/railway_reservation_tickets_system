<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        // Validate all data coming from request
        $this->validate($request, [
            "name"      => ['required', 'string'],
            "email"     => ['required', 'email'],
            "message"   => ['required'],
        ]);

        // save data to contact table in database
        Contact::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'message'   => $request->message,
        ]);

        return redirect()->back();

    }

}
