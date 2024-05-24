<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengembalianBuku;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class DendaController extends Controller
{
    public function index()
    {
        $denda_lunas = PengembalianBuku::get();
        $denda_belum_lunas = PengembalianBuku::get();
        $user = User::where('is_admin',0)->get();

        return view('admin.denda.index',compact('denda_lunas','user','denda_belum_lunas'));
    }

    public function show($id)
    {
        // $pengembalian_buku = PengembalianBuku::with('murid', 'buku')->findOrFail($id);
        $pengembalian_buku = new Client();
        $url = "http://127.0.0.1:8001/api/admin/pengembalian_buku/show/$id";
        $response = $pengembalian_buku->request('get', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $pengembalian_buku = $contentArray['data'];

        return view('admin.denda.show', ['pengembalian_buku' => $pengembalian_buku]);
    }
    
    public function update_jumlah_denda(Request $request,$id)
    {
        $denda = PengembalianBuku::findOrFail($id); 
        $denda->jumlah_denda = $request->jumlah_denda;
        $denda->update();
        return redirect()->back()->with('success', 'Berhasil Membayar Denda');
    }
}