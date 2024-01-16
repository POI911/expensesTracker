<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('signup');
    }

    public function store(){
        $attributes = request()->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username|max:255',
            'password' => 'required|string|max:255|min:6',
            'VerifyPassword' => 'required|string|max:255|min:6',
        ]);

        if($attributes['password'] === $attributes['VerifyPassword'])
        {
            $user = User::create([
                'name' => $attributes['name'],
                'username' => $attributes['username'],
                'password' => Hash::make($attributes['password'])

            ]);

            auth()->login($user);

            return redirect('/');
        }
        else{
            return back()->withErrors(['error' => 'Passwords Nomatch!']);
        }
    }
}
