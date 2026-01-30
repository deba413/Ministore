<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
    return view('admin-panel.register');
        
    }

    public function register(Request $request)
    {
        // Handle registration logic here
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password);
        $user->role = 2; // Set role as admin
        $user->save();

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }
}
