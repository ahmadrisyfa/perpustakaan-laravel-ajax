<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Murid;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class MuridController extends Controller
{
    public function index()
    {
        $murid = Murid::get();
        $user = User::where('is_admin',0)->get();

        return view('admin.murid.index',compact('murid','user'));
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
        $murid = Murid::findOrFail($id); 


        $validatedData = $request->validate([
            'nama' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'user_id' => 'required',            
        ]);   
        

        $murid->update($validatedData);

        return response()->json(['message' => 'Data Updated successfully']);
    }

    
    public function destroy($id)
    {
        $murid = Murid::find($id);        
        $murid->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }
}