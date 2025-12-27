<?php

namespace App\Http\Controllers\Admin;
//to specify User model at the top of the file.
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show all users
    public function index()
    {
        $users = User::all(); // get all users
        return view('admin.users.index', compact('users'));
    }
}
