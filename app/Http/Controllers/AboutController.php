<?php

namespace App\Http\Controllers;

use App\Entities\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::get()->first();
        return view('show_about', ['about' => $about]);
    }
}
