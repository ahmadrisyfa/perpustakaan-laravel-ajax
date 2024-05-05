<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $user = User::get();
        return view('admin.user.index',compact('user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required|max:255',
            'is_admin' => 'required',
            'email' => 'required|unique:users',
            'password'=>'required|min:5|max:255'
        ]);
 
         $validatedData['password'] = Hash::make($validatedData['password']);
 
 
        User::create($validatedData);

        return response()->json(['message' => 'Data created successfully']);
    }
    public function edit($id)
    {
        $data = User::find($id);
        return response()->json($data);
    }
    public function update($id, Request $request)
    {
        $user = User::findOrFail($id); 


        $validatedData = $request->validate([
            'name'=> 'required|max:255',
            'is_admin' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
            'password'=>'required|min:5|max:255'
        ]);
 
        $validatedData['password'] = Hash::make($validatedData['password']);
        

        $user->update($validatedData);

        return response()->json(['message' => 'Data Updated successfully']);
    }

    
    public function destroy($id)
    {
        $user = User::find($id);        
        $user->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }
}