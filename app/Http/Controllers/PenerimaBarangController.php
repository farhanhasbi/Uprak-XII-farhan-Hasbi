<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BarangMasuk;
use App\PenerimaBarang;
use App\KategoriBarang;
use App\Http\Requests\PenerimaBarangRequest;
use DB;

class PenerimaBarangController extends Controller
{
   public function index()
   {
       $pb = BarangMasuk::with('penerimabarang')->get();
       return view('penerima_barangs.index',compact('pb'));
   }
   public function show($id)
   {
    $data = PenerimaBarang::where('id', $id)->get();
    return response()->json(['data' => $data]);
}

public function detail($id)
{
    $data = PenerimaBarang::with('id')->findOrFail($id);
    return view('barang_masuks.index', compact('data'));
}

public function list()
{
    $data = PenerimaBarang::with('id')->get();
    return response()->json(['data' => $data]);
}

public function store(PenerimaBarangRequest $request)
{
    $br = PenerimaBarang::create($request->all());
    if ($br) {
        return response()->json(['message' => 'created'], 201);
    } else {
        return response()->json(['message' => 'Somethink Wrong'], 500);
    }
}
public function update(PenerimaBarangRequest $request, $id)
{
 DB::beginTransaction();
 try {
    PenerimaBarang::where('id', $id)->update($request->except(['_token']));
    DB::commit();
} catch (\Exception $e) {
    DB::rollBack();
    return response()->json(['message' => $e->getMessage()], 500);
}
}
public function delete($id)
{
    DB::beginTransaction();
    try {
        PenerimaBarang::where('id', $id)->delete();
        DB::commit();
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['message' => $e->getMessage()], 500);
    }
  }
}