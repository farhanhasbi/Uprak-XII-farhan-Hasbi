@extends('layouts.app')

@push('meta')
<meta name="content" content="barang">
@endpush

@push('css')
<link href="http://asset.wibs.sch.id/migration/admin/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
<link href="http://asset.wibs.sch.id/migration/admin/plugins/select2/select2-bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="http://asset.wibs.sch.id/migration/admin/plugins/select2/select2.min.js" type="text/javascript"></script>
<script src="{{ asset('js/datatable-main.js') }}"></script>
<script src="{{ asset('js/main.js')}}"></script>

@if($barangbr)
<script>
    lastClick = 'edit-button';
    id = '{{ $barangbr->id }}';
</script>
@else
<script>
    lastClick = 'create-button';
</script>
@endif
@endpush


@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header font-weight-bold">
        </div>

        <div class="card-body">
            <form id="form">
                @if($barangbr)
                <input type="hidden" value="{{ $barangbr->id }}" id="idbr">
                @endif
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="name">Nama Barang</label>
                                    <input type="text" class="form-control"  name="nama_barang" value="{{ old('nama_barang', $barangbr['nama_barang'] ?? null) }}">
                                </div>


                                <div class="form-group">
                                  <label for="formGroupExampleInput">Tipe Barang</label>
                                  <select class="form-control" name="tipe_barang" id="formGroupExampleInput">
                                    @foreach($br as $brg)
                                    <option value="{{ $brg->id }}">{{ $brg->tipe_barang }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="name">Kondisi Barang</label>
                                <input type="text" class="form-control"  name="kondisi_barang" value="{{ old('kondisi_barang', $barangbr['kondisi_barang'] ?? null) }}">
                            </div>

                            <div class="form-group">
                                <label for="name">jumlah Barang</label>
                                <input type="text" class="form-control"  name="jumlah_barang" value="{{ old('jumlah_barang', $barangbr['jumlah_barang'] ?? null) }}">
                            </div>

                            <div class="form-group">
                                    <label for="name">vendor</label>
                                    <input type="text" class="form-control"  name="vendor" value="{{ old('vendor', $barangbr['vendor'] ?? null) }}">
                            </div>

                        </div>
                    </div>
                </div>
            </div> 
        </form>

        <div class="float-right mt-3">
            <button type="button" class="btn btn-default mr-3"><a href="{{ url('barang')}}" style="color:black;">Kembali</a></button>
            <button type="submit" id="submit" class="btn create-button btn-primary">Submit</button>
        </div>
    </div>
</div>
</div>
@endsection