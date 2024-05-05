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
        $url = "http://127.0.0.1:8001/api/admin/pinjam_buku";
        $response = $pinjam_buku->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $pinjam_buku = $contentArray['data'];
        $jumlah_pinjam_buku = count($pinjam_buku);

        $jumlah_pinjam_buku_belum_di_kembalikan = count(array_filter($pinjam_buku, function ($buku) {
            return $buku['status'] == 0;
        }));

        $rak = Rak::count();
        $category = Category::count();
        $buku = Buku::count();
        $user = User::count();
        $murid = Murid::count();

        return view('admin.dashboard.index', compact('rak', 'category', 'buku', 'user', 'murid', 'jumlah_pinjam_buku', 'jumlah_pinjam_buku_belum_di_kembalikan'));
    }
}
