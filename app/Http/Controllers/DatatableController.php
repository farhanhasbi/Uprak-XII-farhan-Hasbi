<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Kategori;
use App\Barang;


class DatatableController extends Controller
{
    public function kategori(DataTables $datatable)
    {
        $data = Kategori::all();

        return $datatable->of($data)
        ->addColumn('action', function($data){
            return '<a id="edit-button" href="'.url("kategori/form/edit", $data->id).'" class="btn btn-warning edit-button"><i class="fa fa-edit"></i></a>
            <button id="delete-button" value="'.$data->id.'" class="btn btn-danger delete-button"><i class="fa fa-trash"></i></button>';
        })
        ->make(true);
    }

     public function barang(DataTables $datatable)
    {
        $data = Barang::all();

        return $datatable->of($data)

        ->addColumn('action', function($data){
            return '<a id="edit-button" href="'.url("barang/form/edit", $data->id).'" class="btn btn-warning edit-button"><i class="fa fa-edit"></i></a>
            <button id="delete-button" value="'.$data->id.'" class="btn btn-danger delete-button"><i class="fa fa-trash"></i></button>';
        })
        ->make(true);
    }


}
