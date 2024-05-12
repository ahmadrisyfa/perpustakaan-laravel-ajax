<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinjamBuku;
use App\Models\Murid;
use App\Models\Buku;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class PinjamBukuController extends Controller
{
    public function index()
    {

        $pinjam_buku = new Client();
        $url = "http://127.0.0.1:8001/api/admin/pinjam_buku";
        $response = $pinjam_buku->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $pinjam_buku = $contentArray['data'];
        $buku = Buku::get();
        $murid = Murid::get();

        return view('admin.pinjam_buku.index', ['pinjam_buku' => $pinjam_buku, 'buku' => $buku, 'murid' => $murid]);
    }

    public function show($id)
    {
        // $pinjam_buku = PinjamBuku::with('murid', 'buku')->findOrFail($id);
        $pinjam_buku = new Client();
        $url = "http://127.0.0.1:8001/api/admin/pinjam_buku/show/$id";
        $response = $pinjam_buku->request('get', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $pinjam_buku = $contentArray['data'];

        return view('admin.pinjam_buku.show', ['pinjam_buku' => $pinjam_buku]);
    }

    public function store(Request $request)
    {

        $buku_id = $request->buku_id;
        $murid_id = $request->murid_id;
        $jumlah_pinjam = $request->jumlah_pinjam;
        $tanggal_pinjam = $request->tanggal_pinjam;
        $tanggal_di_kembalikan = $request->tanggal_di_kembalikan;
        $jumlah_denda = $request->jumlah_denda;
        $status = $request->status;



        $parameter = [
            'buku_id' => $buku_id,
            'murid_id' => $murid_id,
            'jumlah_pinjam' => $jumlah_pinjam,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_di_kembalikan' => $tanggal_di_kembalikan,
            'jumlah_denda' => $jumlah_denda,
            'status' => $status,

        ];

        $pinjam_buku = new Client();
        $url = "http://127.0.0.1:8001/api/admin/pinjam_buku/create";
        $response = $pinjam_buku->request('POST', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if ($contentArray['status'] != true) {
            $error = $contentArray['data'];
            return redirect('admin/pinjam_buku1')->withErrors($error)->withInput();
        } else {
            return redirect('admin/pinjam_buku')->with('success', 'Berhasil Menambahkan Data');
        }
    }
    public function edit($id)
    {
    }
    public function update($id, Request $request)
    { {

            $buku_id = $request->buku_id;
            $murid_id = $request->murid_id;
            $jumlah_pinjam = $request->jumlah_pinjam;
            $tanggal_pinjam = $request->tanggal_pinjam;
            $tanggal_di_kembalikan = $request->tanggal_di_kembalikan;
            $jumlah_denda = $request->jumlah_denda;
            $status = $request->status;



            $parameter = [
                'buku_id' => $buku_id,
                'murid_id' => $murid_id,
                'jumlah_pinjam' => $jumlah_pinjam,
                'tanggal_pinjam' => $tanggal_pinjam,
                'tanggal_di_kembalikan' => $tanggal_di_kembalikan,
                'jumlah_denda' => $jumlah_denda,
                'status' => $status,

            ];

            $pinjam_buku = new Client();
            $url = "http://127.0.0.1:8001/api/admin/pinjam_buku/update/$id";
            $response = $pinjam_buku->request('PUT', $url, [
                'headers' => ['Content-type' => 'application/json'],
                'body' => json_encode($parameter)
            ]);
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);
            if ($contentArray['status'] != true) {
                $error = $contentArray['data'];
                return redirect('admin/pinjam_buku1')->withErrors($error)->withInput();
            } else {
                return redirect('admin/pinjam_buku')->with('success', 'Berhasil Update Data');
            }
        }
    }


    public function destroy($id)
    {
        $pinjam_buku = new Client();
        $url = "http://127.0.0.1:8001/api/admin/pinjam_buku/delete/$id";
        $response = $pinjam_buku->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if ($contentArray['status'] != true) {
            $error = $contentArray['data'];
            return redirect('admin/pinjam_buku1')->withErrors($error)->withInput();
        } else {
            return redirect('admin/pinjam_buku')->with('success', 'Berhasil Hapus Data');
        }
    }
}
