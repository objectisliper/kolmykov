<?php

namespace App\Http\Controllers;

use App\Entities\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::get()->first();
        return view('show_contact', ['contact' => $contact]);
    }
}
