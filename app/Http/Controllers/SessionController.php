<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(){
        return view('login');

    }

    public function store(){

        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        if(auth()->attempt($attributes)){
            return redirect('/records/index');
        }
        else{
           return back()->withErrors(['error' => 'Username or Password is wrong']);
        }


    }
    public function destroy(){

        auth()->logout();


        return redirect('/');
    }
}
