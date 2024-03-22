<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::get();
        return view('admin.category.index',compact('category'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'nama' => 'required',
            // 'gambar' => 'required|image',
            
        ]);

        // if ($request->deskripsi) {
        //     $validatedData['deskripsi'] = nl2br($request->deskripsi);
        // }

        // if ($request->hasFile('gambar')) {
        //     $validatedData['gambar'] = $request->file('gambar')->store('img-foto-category');
        // }

        Category::create($validatedData);

        return response()->json(['message' => 'Data created successfully']);
    }
    public function edit($id)
    {
        $data = Category::find($id);
        return response()->json($data);
    }
    public function update($id, Request $request)
    {
        $category = Category::findOrFail($id); 


        $validatedData = $request->validate([
            'nama' => 'required',
            // 'gambar' => 'nullable|image',
        ]);


        // if ($request->hasFile('gambar')) {
        //     if ($category->gambar) {
        //         Storage::delete($category->gambar);
        //     }
        //     $validatedData['gambar'] = $request->file('gambar')->store('img-foto-category');
        // }

        $category->update($validatedData);

        return response()->json(['message' => 'Data Updated successfully']);
    }

    
    public function destroy($id)
    {
        $category = Category::find($id);
        // if ($category->gambar) {
        //     Storage::delete($category->gambar);
        // }
        $category->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }
}