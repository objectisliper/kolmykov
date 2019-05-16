<?php

namespace App\Http\Controllers\Admin;

use App\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $params = [
          'users' => User::get(),
        ];
        return view('admin.users.index', $params);
    }
}
