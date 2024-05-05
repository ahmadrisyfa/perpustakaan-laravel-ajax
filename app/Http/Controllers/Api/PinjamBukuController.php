<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PinjamBuku;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PinjamBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PinjamBuku::with('buku', 'murid')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data Di Temukan',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new PinjamBuku;

        $rules = [
            'buku_id' => 'required',
            'murid_id' => 'required',
            'jumlah_pinjam' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_di_kembalikan' => 'required',
            'jumlah_denda' => 'nullable',
            'status' => 'nullable',

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Memasukan Data',
                'data' => $validator->errors()
            ]);
        }
        $data->buku_id = $request->buku_id;
        $data->murid_id = $request->murid_id;
        $data->jumlah_pinjam = $request->jumlah_pinjam;
        $data->tanggal_pinjam = $request->tanggal_pinjam;
        $data->tanggal_di_kembalikan = $request->tanggal_di_kembalikan;
        $data->jumlah_denda = $request->jumlah_denda;
        $data->status = $request->status;


        $post = $data->save();

        return response()->json([
            'status' => true,
            'message' => "Data Berhasil Di Tambahkan",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PinjamBuku::find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data Di Temukan',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak Di Tenukan'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = PinjamBuku::find($id);
        if (empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak DiTemukan'
            ], 404);
        }

        $rules = [
            'buku_id' => 'required',
            'murid_id' => 'required',
            'jumlah_pinjam' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_di_kembalikan' => 'required',
            'jumlah_denda' => 'nullable',
            'status' => 'nullable',

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Memasukan Data',
                'data' => $validator->errors()
            ]);
        }
        $data->buku_id = $request->buku_id;
        $data->murid_id = $request->murid_id;
        $data->jumlah_pinjam = $request->jumlah_pinjam;
        $data->tanggal_pinjam = $request->tanggal_pinjam;
        $data->tanggal_di_kembalikan = $request->tanggal_di_kembalikan;
        $data->jumlah_denda = $request->jumlah_denda;
        $data->status = $request->status;


        $post = $data->save();

        return response()->json([
            'status' => true,
            'message' => "Data Berhasil Di Update",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PinjamBuku::find($id);
        if (empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak DiTemukan'
            ], 404);
        }

        $post = $data->delete();

        return response()->json([
            'status' => true,
            'message' => "Data Berhasil Di Hapus",
        ]);
    }
}
