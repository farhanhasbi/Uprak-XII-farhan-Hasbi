<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Kategori;
use App\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('barang.index');
    }

     public function form($action, $id = null)
    {
        switch ($action) {
            case 'create':
            $br = Kategori::with('barang')->get();
            $barangbr = null;
            return view('barang.form', compact('barangbr', 'br', 'action', 'id'));
            break;

            case 'edit':
            $barangbr = Barang::find($id);
            $br = Kategori::with('barang')->get();
            return view ('barang.form', compact('barangbr', 'br'));
            default:
                # code...
            break;
        }
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
        $barangbr = Barang::create($request->all());
        if ($barangbr) {
            return response()->json(['message' => 'created'], 201);
        } else {
            return response()->json(['message' => 'Somethink Wrong'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            Barang::where('id', $id)->update($request->except(['_token']));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Barang::where('id', $id)->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function export()
    {
        return Excel::download(new BarangExport, 'barang.xlsx');
    }
}
