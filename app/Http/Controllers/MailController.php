<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send()
    {
        Mail::send(['text'=>'mail'],['name', 'Web dev blog'], function ($message){
           $message->to('site.frixys@gmail.com', 'Site frixys')->subject('Test email');
           $message->from('site.frixys@gmail.com', 'Site frixys');
        });
    }


}
