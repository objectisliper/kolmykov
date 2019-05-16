<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Entities\Contact;

class MailController extends Controller
{
    public function send(Request $request)
    {
        Mail::send(['html'=>'mail'],['name' => $_POST['name'], 'phone' => $_POST['phone'], 'email' => $_POST['email'], 'text' => $_POST['text']], function ($message){
           $message->to('objectisliper@gmail.com', 'Site frixys')->subject('Test email');
           $message->from('site.frixys@gmail.com', 'Site frixys');
        });
        $contact = Contact::get()->first();
        return view('show_contact', ['contact' => $contact]);
    }


}
