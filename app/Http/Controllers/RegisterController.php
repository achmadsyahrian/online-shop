<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'username' => ['required', 'min:5', 'max:15', 'unique:users'],
            'name' => 'required|max:255',
            'role' => 'required',
            'phone' => ['required', 'regex:/^[0-9]{11,}$/'],
            'password' => 'required|min:5|max:255'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect('/login')->with('success', 'Registration Successfull! Please Login');
    }
}
