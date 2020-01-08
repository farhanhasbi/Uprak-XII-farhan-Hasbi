@extends('layouts.app')

@include('kategori.assets')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title float-right">
                        <button class="btn btn-info" id="refresh-button"><i class="fa fa-spinner"></i></button>
                        <a href="{{ url('kategori/form/create') }}" class="btn btn-info"><i class="fa fa-plus-square"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Tipe Barang</th>
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