<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengembalianBuku;
use App\Models\PinjamBuku;
use App\Models\Murid;
use App\Models\Buku;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

use App\Mail\KirimEmailPengembalianBuku;
use Illuminate\Support\Facades\Mail;

class PengembalianBukuController extends Controller
{

  
    public function index()
    {

        $pengembalian_buku = new Client();
        $url = env('URL_API') . "api/admin/pengembalian_buku";

        $response = $pengembalian_buku->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $pengembalian_buku = $contentArray['data'];
        $buku = Buku::get();
        $murid = Murid::get();

        return view('admin.pengembalian_buku.index', ['pengembalian_buku' => $pengembalian_buku, 'buku' => $buku, 'murid' => $murid]);
    }

    public function show($id)
    {
        // $pengembalian_buku = PengembalianBuku::with('murid', 'buku')->findOrFail($id);
        $pengembalian_buku = new Client();
        $url =  env('URL_API') . "api/admin/pengembalian_buku/show/$id";
        $response = $pengembalian_buku->request('get', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $pengembalian_buku = $contentArray['data'];

        return view('admin.pengembalian_buku.show', ['pengembalian_buku' => $pengembalian_buku]);
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

        $id_pinjam_buku = $request->id_pinjam_buku;




        $parameter = [
            'id' => $id_pinjam_buku, // di tambahkan sendiri di Api
            'buku_id' => $buku_id,
            'murid_id' => $murid_id,
            'jumlah_pinjam' => $jumlah_pinjam,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_di_kembalikan' => $tanggal_di_kembalikan,
            'jumlah_denda' => $jumlah_denda,
            'status' => $status,

        ];

        // Untuk Update status tabel pinjam buku 
        $pinjam_buku = PinjamBuku::findOrFail($id_pinjam_buku); 
        $pinjam_buku->status = 1;
        $pinjam_buku->update();

        $pengembalian_buku = new Client();
        $url =  env('URL_API') . "api/admin/pengembalian_buku/create";
        $response = $pengembalian_buku->request('POST', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if ($contentArray['status'] != true) {
            $error = $contentArray['data'];
            return redirect('admin/pengembalian_buku1')->withErrors($error)->withInput();
        } else {
            return redirect('admin/pengembalian_buku/show/'. $id_pinjam_buku)->with('success', 'Berhasil Menambahkan Data');
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

            $pengembalian_buku = new Client();
            $url =  env('URL_API') . "api/admin/pengembalian_buku/update/$id";
            $response = $pengembalian_buku->request('PUT', $url, [
                'headers' => ['Content-type' => 'application/json'],
                'body' => json_encode($parameter)
            ]);
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);
            if ($contentArray['status'] != true) {
                $error = $contentArray['data'];
                return redirect('admin/pengembalian_buku1')->withErrors($error)->withInput();
            } else {
                return redirect('admin/pengembalian_buku')->with('success', 'Berhasil Update Data');
            }
        }
    }


    public function destroy($id)
    {
        $pengembalian_buku = new Client();
        $url =  env('URL_API') . "api/admin/pengembalian_buku/delete/$id";
        $response = $pengembalian_buku->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if ($contentArray['status'] != true) {
            $error = $contentArray['data'];
            return redirect('admin/pengembalian_buku1')->withErrors($error)->withInput();
        } else {
            return redirect('admin/pengembalian_buku')->with('success', 'Berhasil Hapus Data');
        }
    }


    public function bayar_denda($id)
    {
        $pengembalian_buku = new Client();
        $url =  env('URL_API') . "api/admin/pengembalian_buku/show/$id";
        $response = $pengembalian_buku->request('get', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $pengembalian_buku = $contentArray['data'];

        return view('admin.pengembalian_buku.bayar_denda', ['pengembalian_buku' => $pengembalian_buku]);
    }

    
    public function bayar_denda_proses(Request $request, $id)
    {
        $pengembalian_buku = PengembalianBuku::findOrFail($id); 
        $pengembalian_buku->jumlah_denda = $request->jumlah_denda;
        $pengembalian_buku->update();
        return redirect('admin/pengembalian_buku')->with('success', 'Berhasil Membayar Denda');
    }
}
