<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function create()
    {
        return view('create-user');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);


        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);


        return redirect()->route('users.show', $user->id);
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('show-user', compact('user'));
    }
}
