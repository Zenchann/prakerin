<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        $response = [
            'success' => true,
            'data' => $produk,
            'message' => 'berhasil'
        ];
        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = new Produk;
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->save();
        $response = [
            'success' => true,
            'data' => $produk,
            'message' => 'berhasil ditambahkan'
        ];
        return response()->json($response, 200);
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        $response = [
            'success' => true,
            'data' => $produk,
            'message' => 'berhasil'
        ];
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $produk = Produk::findOrFail($id);
        $produk->produk = $request->produk;
        $produk->harga = $request->harga;
        $produk->save();
        $response = [
            'success' => true,
            'data' => $produk,
            'message' => 'berhasil di edit'
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id)->delete();
        $response = [
            'success' => true,
            'data' => $produk,
            'message' => 'berhasil dihapus'
        ];
        return response()->json($response, 200);
    }
}
