<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rak;
use Illuminate\Support\Facades\Storage;

class RakController extends Controller
{
    public function index()
    {
        $rak = Rak::get();
        return view('admin.rak.index',compact('rak'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'lantai' => 'required',
            
        ]);        

        Rak::create($validatedData);

        return response()->json(['message' => 'Data created successfully']);
    }
    public function edit($id)
    {
        $data = Rak::find($id);
        return response()->json($data);
    }
    public function update($id, Request $request)
    {
        $rak = Rak::findOrFail($id); 


        $validatedData = $request->validate([
            'nama' => 'required',
            'lantai' => 'required',
        ]);
        

        $rak->update($validatedData);

        return response()->json(['message' => 'Data Updated successfully']);
    }

    
    public function destroy($id)
    {
        $rak = Rak::find($id);        
        $rak->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }
}