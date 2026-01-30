<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNot('role', 1)->get();
        // $users = User::all();
        return view('admin-panel.users.list', compact('users'));
    }
}
