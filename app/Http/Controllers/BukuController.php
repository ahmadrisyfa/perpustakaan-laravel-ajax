<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Rak;
use App\Models\Category;

use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::get();
        $rak = Rak::all();
        $category = Category::all();

        return view('admin.buku.index',compact('buku','rak','category'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'pengarang' => 'nullable',
            'penerbit' => 'nullable',
            'isbn' => 'nullable',
            'tahun' => 'nullable',
            'sampul_buku' => 'required|image',
            'sampul_buku_belakang' => 'required|image',
            'stok' => 'required',
            'rak_id' => 'required',
            'category_id' => 'required',            
        ]);        

        if ($request->hasFile('sampul_buku')) {
            $validatedData['sampul_buku'] = $request->file('sampul_buku')->store('img-foto-sampul-buku');
        }
        if ($request->hasFile('sampul_buku_belakang')) {
            $validatedData['sampul_buku_belakang'] = $request->file('sampul_buku_belakang')->store('img-foto-sampul-buku');
        }
        Buku::create($validatedData);

        return response()->json(['message' => 'Data created successfully']);
    }
    public function show($id)
    {
        $data = Buku::find($id);
        return response()->json($data);
    }
    public function edit($id)
    {
        $data = Buku::find($id);
        return response()->json($data);
    }
    public function update($id, Request $request)
    {
        $buku = Buku::findOrFail($id); 


        $validatedData = $request->validate([
            'judul' => 'required',
            'pengarang' => 'nullable',
            'penerbit' => 'nullable',
            'isbn' => 'nullable',
            'tahun' => 'nullable',
            'sampul_buku' => '',
            'sampul_buku_belakang' => '',        
            'stok' => 'required',
            'rak_id' => 'required',
            'category_id' => 'required',            
        ]);        

        if ($request->hasFile('sampul_buku')) {
            if ($buku->sampul_buku) {
                Storage::delete($buku->sampul_buku);
            }
            $validatedData['sampul_buku'] = $request->file('sampul_buku')->store('img-foto-sampul-buku');
        }

        if ($request->hasFile('sampul_buku_belakang')) {
            if ($buku->sampul_buku_belakang) {
                Storage::delete($buku->sampul_buku_belakang);
            }
            $validatedData['sampul_buku_belakang'] = $request->file('sampul_buku_belakang')->store('img-foto-sampul-buku');
        }

        $buku->update($validatedData);

        return response()->json(['message' => 'Data Updated successfully']);
    }

    
    public function destroy($id)
    {
        $buku = Buku::find($id); 
        if ($buku->sampul_buku) {
            Storage::delete($buku->sampul_buku);
        }   
        if ($buku->sampul_buku_belakang) {
            Storage::delete($buku->sampul_buku_belakang);
        }       
        $buku->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }
}