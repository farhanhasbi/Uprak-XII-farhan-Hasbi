@extends('layouts.app')

@include('barang.assets')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title float-right">
                        <button class="btn btn-info" id="refresh-button"><i class="fa fa-spinner"></i></button>
                        <a href="{{ url('barang/form/create') }}" class="btn btn-info"><i class="fa fa-plus-square"></i></a>
                        <a href="/barang/export_excel" class="btn btn-success my-3" target="_blank">EXPORT</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Tipe Barang</th>
                                    <th>Kondisi Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th>Vendor</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection