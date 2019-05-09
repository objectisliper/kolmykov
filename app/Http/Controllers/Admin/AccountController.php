<?php
/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 09.05.2019
 * Time: 20:34
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}