<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Murid;
use App\Models\PinjamBuku;
use GuzzleHttp\Client;

class SiswaController extends Controller
{

    public function detail_siswa()
    {
        return view('siswa.detail');
    }

    public function detail_siswa_js()
    {
        $data = Murid::where('user_id', auth()->user()->id)->with('user')->get();
        return response([
            'data' => $data
        ]);
    }

    public function daftar_pinjam()
    {
        return view('siswa.daftar_pinjam');
    }

    public function daftar_pinjam_buku_js()
    {

        // $pinjam_buku_client = new Client();
        // $url = "http://127.0.0.1:8001/api/admin/pinjam_buku";
        // $response = $pinjam_buku_client->request('GET', $url);
        // $content = $response->getBody()->getContents();
        // $contentArray = json_decode($content, true);
        // $pinjam_buku = $contentArray['data'];
        // $pinjam_buku = array_filter($pinjam_buku, function ($item) {
        //     return $item['murid']['user_id'] == auth()->user()->id;
        // });

        $data = PinjamBuku::with('buku', 'murid')
            ->whereHas('murid', function ($query) {
                $query->where('user_id', Auth()->user()->id);
            })
            ->get();

        return response([
            'data' => $data
        ]);
    }
}
