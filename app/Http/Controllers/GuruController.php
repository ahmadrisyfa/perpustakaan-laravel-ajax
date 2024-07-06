<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Murid;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $guru = murid::where('status','guru')->get();
        $user = User::where('is_admin',2)->get();

        return view('admin.guru.index',compact('guru','user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'user_id' => 'required',   
            'status' => 'required',            
        ]);        

        Murid::create($validatedData);

        return response()->json(['message' => 'Data created successfully']);
    }
    public function edit($id)
    {
        $data = Murid::find($id);
        return response()->json($data);
    }
    public function update($id, Request $request)
    {
        $guru = Murid::findOrFail($id); 


        $validatedData = $request->validate([
            'nama' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'user_id' => 'required',            
        ]);   
        

        $guru->update($validatedData);

        return response()->json(['message' => 'Data Updated successfully']);
    }

    
    public function destroy($id)
    {
        $guru = Murid::find($id);        
        $guru->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }
}