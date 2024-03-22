<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('template.auth.register');
    }
    public function store(Request $request)
    {
       $validatedData = $request->validate([
           'name'=> 'required|max:255',
           'is_admin' => '',
           'email' => 'required|unique:users',
           'password'=>'required|min:5|max:255'
       ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['is_admin'] = 0;


       User::create($validatedData);
        return redirect('/login')->with('message_success','registrasi berhasil! silahkan Login');
    }
}
