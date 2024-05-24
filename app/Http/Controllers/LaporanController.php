<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinjamBuku;
use App\Models\PengembalianBuku;

class LaporanController extends Controller
{
    public function index()
    {
        // $pinjam_buku = PinjamBuku::get();
        // $pengembalian_buku = PengembalianBuku::get();
        // $denda = PengembalianBuku::get();

        return view('admin.laporan.index');
    }

    public function pinjam_buku(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $pinjam_buku = PinjamBuku::where('status',0)->whereBetween('created_at', [$startDate , $endDate])->get();

        return view('admin.laporan.cetak_pinjam_buku',compact('pinjam_buku'));

    }

    public function pengembalian_buku(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $pengembalian_buku = PengembalianBuku::whereBetween('created_at', [$startDate , $endDate])->get();

        return view('admin.laporan.cetak_pengembalian_buku',compact('pengembalian_buku'));

    }

    public function denda(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $denda = PengembalianBuku::whereBetween('created_at', [$startDate , $endDate])->get();

        return view('admin.laporan.cetak_denda',compact('denda'));

    }
}
