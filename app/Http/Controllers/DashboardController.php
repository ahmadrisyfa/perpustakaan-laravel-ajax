<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rak;
use App\Models\Category;
use App\Models\Buku;
use App\Models\User;
use App\Models\Murid;
use GuzzleHttp\Client;

class DashboardController extends Controller
{
    public function index()
    {
        $pinjam_buku = new Client();
        $url =  env('URL_API') . "api/admin/pinjam_buku";
        $response = $pinjam_buku->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $pinjam_buku = $contentArray['data'];
        $jumlah_pinjam_buku = count($pinjam_buku);

        $jumlah_pinjam_buku_belum_di_kembalikan = count(array_filter($pinjam_buku, function ($buku) {
            return $buku['status'] == 0;
        }));



        $pengembalian_buku = new Client();
        $url_pengembalian_buku =  env('URL_API') . "api/admin/pengembalian_buku";
        $response_pengembalian_buku = $pengembalian_buku->request('GET', $url_pengembalian_buku);
        $content_pengembalian_buku = $response_pengembalian_buku->getBody()->getContents();
        $content_pengembalian_bukuArray = json_decode($content_pengembalian_buku, true);
        $pengembalian_buku = $content_pengembalian_bukuArray['data'];
        $jumlah_pengembalian_buku = count($pengembalian_buku);
      


        $rak = Rak::count();
        $category = Category::count();
        $buku = Buku::count();
        $user = User::count();
        $murid = Murid::count();
        
        return view('admin.dashboard.index', compact('rak', 'category', 'buku', 'user', 'murid','jumlah_pinjam_buku','jumlah_pinjam_buku_belum_di_kembalikan','jumlah_pengembalian_buku'));
    }

    public function daftar_buku()
    {
        $buku = Buku::InRandomOrder()->get();
        return view('daftar_buku.index',compact('buku'));
    }
    
    public function daftar_buku_show($id)
    {
        $buku_detail = Buku::find($id);
        $buku = Buku::InRandomOrder()->get();
        return view('daftar_buku.show',compact('buku_detail','buku'));
    }

    public function daftar_buku_search(Request $request)
    {
        $search = $request->input('search');
        $buku = Buku::where('judul', 'LIKE', "%{$search}%")
                    ->orWhere('pengarang', 'LIKE', "%{$search}%")
                    ->get();
        return view('daftar_buku.index', compact('buku'));
    }

    public function landing_page()
    {
        return view('landing_page');
    }
}
