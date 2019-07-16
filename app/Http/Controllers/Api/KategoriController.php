<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori;

class KategoriController extends Controller
{

    public function index()
    {
        $kategori = Kategori::all();
        $response = [
            'success' => true,
            'data' => $kategori,
            'message' => 'berhasil'
        ];
        return response()->json($response, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $kategori = new Kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = str_slug($request->nama_kategori);
        $kategori->save();
        $response = [
            'success' => true,
            'data' => $kategori,
            'message' => 'berhasil'
        ];
        return response()->json($response, 200);
    }

    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        $response = [
            'success' => true,
            'data' => $kategori,
            'message' => 'berhasil'
        ];
        return response()->json($response, 200);
    }

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
        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = str_slug($request->nama_kategori);
        $kategori->save();
        $response = [
            'success' => true,
            'data' => $kategori,
            'message' => 'berhasil'
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
        $kategori = Kategori::findOrFail($id)->delete();
        $response = [
            'success' => true,
            'data' => $kategori,
            'message' => 'berhasil'
        ];
        return response()->json($response, 200);
    }
}
