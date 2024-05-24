<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Murid;
use App\Models\PinjamBuku;
use App\Models\PengembalianBuku;
use GuzzleHttp\Client;

class SiswaController extends Controller
{

    public function detail_siswa()
    {
        return view('siswa.detail_siswa ');
    }

    public function detail_siswa_js()
    {
        $data = Murid::where('user_id', auth()->user()->id)->with('user')->get();
        return response([
            'data' => $data
        ]);
    }

    public function daftar_pinjam_buku()
    {
        return view('siswa.daftar_pinjam_buku');
    }

    public function daftar_pinjam_buku_js()
    {

        $data = PinjamBuku::with('buku', 'murid')
        ->whereHas('murid', function ($query) {
            $query->where('user_id', Auth()->user()->id);
        })
        ->where('status', 0)
        ->get();

        return response([
            'data' => $data
        ]);
    }

    public function daftar_pengembalian_buku()
    {
        return view('siswa.daftar_pengembalian_buku');
    }

    public function daftar_pengembalian_buku_js()
    {

     
        $data = PengembalianBuku::with('buku', 'murid')
        ->whereHas('murid', function ($query) {
            $query->where('user_id', Auth()->user()->id);
        })
        // ->where('status', 0)
        ->get();

        return response([
            'data' => $data
        ]);
    }
}
